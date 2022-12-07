<?php
/*
Hotel names:[
    "Backpacker hostel",
    "ABC Bangkok",
    "Miracle grand at Bangkok hotel",
    "Palace of grand masters",
    "Grand palace hotel"
]

input:"Backpacker" => expected output:["Backpacker hostel"]
input:"backpacker" => expected output:["Backpacker hostel"]
input:"backpack" => expected output:[]
input:"miracle bangkok" => expected output: ["Miracle grand at Bangkok hotel"]
input:"bangkok miracle" => expected output: ["Miracle grand at Bangkok hotel"]
input:"bangkok backpacker" => expected output:[]
input:"grand" => expected output: ["Miracle grand at Bangkok hotel", "Palace of grand masters", "Grand palace hotel"]

*/

class Hotels
{
    public $hotelNames = [
        "Backpacker hostel",
        "ABC Bangkok",
        "Miracle grand at Bangkok hotel",
        "Palace of grand masters",
        "Grand palace hotel"
    ];
    
    public $cases = [
        [
            'keyword' => 'Backpacker',
            'expect' => ["Backpacker hostel"]
        ],
        [
            'keyword' => 'backpacker',
            'expect' => ["Backpacker hostel"]
        ],
        [
            'keyword' => 'backpack',
            'expect' => []
        ],
        [
            'keyword' => 'miracle bangkok',
            'expect' => ["Miracle grand at Bangkok hotel"]
        ],
        [
            'keyword' => 'bangkok miracle',
            'expect' => ["Miracle grand at Bangkok hotel"]
        ],
        [
            'keyword' => 'bangkok backpacker',
            'expect' => []
        ],
        [
            'keyword' => 'grand',
            'expect' => ["Miracle grand at Bangkok hotel", "Palace of grand masters", "Grand palace hotel"],
        ]
    ]; 
    
    public function find(string $keyword)
    {
        $hotels = [];
        $keywordLower = strtolower($keyword);
        $keywords = explode(' ', $keywordLower);
        
        foreach($this->hotelNames as $hotelName) {
            $hotelNameLower = strtolower($hotelName);
            $hotelNameArray = explode(' ', $hotelNameLower);

            $correct = true;
            foreach($keywords as $keyword) {
                if(!in_array($keyword, $hotelNameArray)) {
                    $correct = false;  
                }
            }
            if($correct) {
                $hotels[] = $hotelName;
            }
        }

        return $hotels;
    }
    
    public function check(bool $printHotels = true, bool $apiResult = true)
    {
        
        foreach($this->cases as $case) {
            $hotels = $this->find($case['keyword']);
            
            echo 'Keyword: ' . $case['keyword'];
            if($hotels === $case['expect']) {
                echo ' (Correct)' . "\n";
            } else {
                echo ' (Wrong)' . "\n";
            }
            
            if($printHotels) {
                var_dump($hotels) . "\n\n";
            }
            
            if($apiResult) {
                echo $this->api($case['keyword'],$hotels);
            }
        }
    }
    
    public function api(string $keyword, array $hotels)
    {
        $apiResult = [
            'keyword' => $keyword,
            'count' => count($hotels),
            'hotels' => $hotels
        ];
        
        return json_encode($apiResult) . "\n\n";
    }
}

$hotels = new Hotels();
$hotels->check(false);
