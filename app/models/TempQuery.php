<?php 

 function closeOldLostAndFound() {
        // 1. Select expired & open events
// CHECK THE REJECT STATUS : 
        $query = "SELECT * FROM lost_found 
            WHERE status = 0 
                AND postStatus = 0 
                AND publishedOn < (CURDATE() - INTERVAL 2 MONTH)";


        $oldReported = $this->query($query);

        if ($oldReported) {
            
            foreach ($oldReported as $report) {
                // 2. Update the event status and reason
                $updateQuery = "UPDATE lost_and_found_pets SET postStatus = 1, closing_reason = :reason WHERE event_id = :id AND postStatus = 0";
                $this->insertLog($report->petid . " Pet Report was closed!");
                $this->query($updateQuery, [
                    'reason' => 'Auto Close',
                    'id' => $report->petid
                ]);
                
                $this->sendNotification($report->id,$report->petName.' : Automatic Closedown!',"Your Pet Report has been closed down due to aging. You can browse our Pet Shelters for adoption opportunities.");
            }

            // 4. Log how many events were updated
            $this->insertLog(count($oldReported) . " old pet reports closed by system.");
        } else {
            
            $this->insertLog("No old pet reports found.");
        }
    }
