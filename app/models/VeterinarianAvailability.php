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
            
            // Adjust END time for 24-hour format
            if($startTime>$endTime){
                $endTime += 12;
            }
            // Add time range
            $result['times'] = ['start' => $startTime, 'end' => $endTime];
        }
        
        return $result;
    }
    

    public function isDayAvailable($parsedAvailability, $dayOfWeek) {
        return in_array($dayOfWeek, $parsedAvailability['days']);
    }

    public function isTimeAvailable($parsedAvailability, $time) {
        // echo json_encode($parsedAvailability['times']);
        return ($time >= $parsedAvailability['times']['start'] && $time <= $parsedAvailability['times']['end']);
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
        $earliestStart = $availabilityTimes[0]['start'];
        $latestEnd = $availabilityTimes[0]['end'];
        
        foreach($availabilityTimes as $timeRange) {
            if($timeRange['start'] < $earliestStart) {
                $earliestStart = $timeRange['start'];
            }
            
            // Adjust END time for 24-hour format
            if($timeRange['start']>$timeRange['end']){
                $timeRange['end'] += 12;
            }
            
            if($timeRange['end'] > $latestEnd) {
                $latestEnd = $timeRange['end'];
            }
        }
        
        return ['start' => $earliestStart, 'end' => $latestEnd];
    }
    
    /**
     * Get all available veterinarians for a specific medical provider on a specific day
     *
     * @param int $medId The medical provider ID
     * @param int $dayOfWeek The day of week (0-6)
     * @return array Array of available veterinarians
     */
    public function getAvailableVeterinariansForDay($medId, $dayOfWeek, $time) {
        $veterinarianModel = new Veterinarians();
        $vets = $veterinarianModel->where(['med_id' => $medId]);

        $availableVets = [];
        foreach($vets as $vet) {
            $parsedAvailability = $this->parseAvailability($vet->availability);
            $isAvailable = $this->isDayAvailable($parsedAvailability, $dayOfWeek) && $this->isTimeAvailable($parsedAvailability, $time);
            // echo json_encode($this->isTimeAvailable($parsedAvailability, $time));
            if($isAvailable) {
                // Add the veterinarian to the available list
                $availableVets[] = $vet;
            }
        }
        
        return $availableVets;
    }
}