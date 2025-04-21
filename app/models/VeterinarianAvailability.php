<?php

class VeterinarianAvailability {
    use Model;
    
    /**
     * Parse a veterinarian's availability string 
     * Format example: "Mon - Fri 8 to 5" 
     * 
     * @param string $availabilityString The availability string to parse
     * @return array An array containing days and time information
     */
    public function parseAvailability($availabilityString) {
        $result = [
            'days' => [],
            'times' => null
        ];
        
        // Days mapping
        $daysMap = [
            'Mon' => 1, // Monday
            'Tue' => 2,
            'Wed' => 3,
            'Thu' => 4,
            'Fri' => 5,
            'Sat' => 6,
            'Sun' => 0  // Sunday
        ];
        
        // Parse the availability string
        if(preg_match('/([A-Za-z]{3})\s*-\s*([A-Za-z]{3})\s*(\d+)\s*to\s*(\d+)/', $availabilityString, $matches)) {
            $startDay = $matches[1];
            $endDay = $matches[2];
            $startTime = (int)$matches[3];
            $endTime = (int)$matches[4];
            
            // Get day numbers
            $startDayNum = $daysMap[$startDay] ?? null;
            $endDayNum = $daysMap[$endDay] ?? null;
            
            if($startDayNum !== null && $endDayNum !== null) {
                // Handle wrap around week (e.g., Sat-Sun)
                if($endDayNum < $startDayNum) {
                    $endDayNum += 7;
                }
                
                // Add all days in range
                for($i = $startDayNum; $i <= $endDayNum; $i++) {
                    $result['days'][] = $i % 7; // Ensure we wrap back to 0-6 range
                }
            }
            
            // Add time range
            $result['times'] = ['start' => $startTime, 'end' => $endTime];
        }
        
        return $result;
    }
    
    /**
     * Check if a specific day of the week is available based on the parsed availability
     * 
     * @param array $parsedAvailability The parsed availability data
     * @param int $dayOfWeek The day of week (0 = Sunday, 1 = Monday, etc.)
     * @return bool True if the day is available, false otherwise
     */
    public function isDayAvailable($parsedAvailability, $dayOfWeek) {
        return in_array($dayOfWeek, $parsedAvailability['days']);
    }
    
    /**
     * Calculate the common available time range across multiple veterinarians
     * 
     * @param array $availabilityTimes Array of time ranges
     * @return array An array with start and end times
     */
    public function calculateCommonTimeRange($availabilityTimes) {
        if(empty($availabilityTimes)) {
            return ['start' => 8, 'end' => 17]; // Default 8 AM to 5 PM
        }
        
        // Find the latest start time and earliest end time
        $latestStart = 0;
        $earliestEnd = 24;
        
        foreach($availabilityTimes as $timeRange) {
            if($timeRange['start'] > $latestStart) {
                $latestStart = $timeRange['start'];
            }
            
            if($timeRange['end'] < $earliestEnd) {
                $earliestEnd = $timeRange['end'];
            }
        }
        
        return ['start' => $latestStart, 'end' => $earliestEnd];
    }
    
    /**
     * Get all available veterinarians for a specific medical provider on a specific day
     *
     * @param int $medId The medical provider ID
     * @param int $dayOfWeek The day of week (0-6)
     * @return array Array of available veterinarians
     */
    public function getAvailableVeterinariansForDay($medId, $dayOfWeek) {
        $veterinarianModel = new Veterinarians();
        $vets = $veterinarianModel->where('med_id', $medId);
        
        $availableVets = [];
        foreach($vets as $vet) {
            $parsedAvailability = $this->parseAvailability($vet->availability);
            if($this->isDayAvailable($parsedAvailability, $dayOfWeek)) {
                $availableVets[] = $vet;
            }
        }
        
        return $availableVets;
    }
}