# FindHotelsByKeyword

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
