var skills = [
    {
        "name": "Straight Bounce",
        "prereq": ["Straight bounce and stop"],
        "latteral_progressions": [
            ["Tuck", "", "Description"],
            ["Pike", "", "Description"],
            ["Straddle", "", "Description"]
        ],
        "linear_progression": [
            ["Twist", "", "Description"]
        ]
    },
    {
        "name": "Twist",
        "prereq": ["Straight bounce"],
        "latteral_progressions": [
            ["Half twist", "", "Description"],
            ["Full twist", "", "Description"],
            ["1&1/2 twist", "", "Description"]
        ],
        "linear_progression": [
            ["Seat", "", "Description"]
        ]
    },
    {
        "name": "Seat",
        "latteral_progressions": {
            "Variations In": [
                ["Half to seat", "", "Description"],
                ["Full to seat", "", "Description"]
            ],
            "Variations Out": [
                ["Half to feet", "", "Description"],
                ["Full to feet", "", "Description"],
                ["1 and a half to feet", "", "Description"]
            ],
            "twist and somi rot": [
                ["Swivel hips (Seat to seat with half twist and a sort of half somi rotation)", "", "Description"]
            ],
            "axis rotation": [
                ["Roller (Seat to seat, full twist about longitudinal)", "", "Description"]
            ],
        },
        "linear_progression": [
            ["Front drop", "", "Description"],
            ["Back Drop", "", "Description"]
        ]
    },
    {
        "name": "Front Drop",
        "latteral_progressions": {
            "Variations In": [
                ["Airplane", "Feet 180| 90- Front", "Better understood as a half twist to front. Jumping backwards."],
                ["Full Twist to Front", "Feet 360| 90- Front", "These are shit. don't be surprised if you don't like it. Jumping forwards"]
            ],
            "Variations Out": [
                ["Half to Feet", "Front 180| 90- Feet", "Not much else to say aboot it"],
                ["Full to Feet", "Front 360| 90- Feet", "Whip those arms around to git some"]
            ],
            "Front Bouncing Shapes and Rotations": [
                ["Front Bounce", "Front Front", "Opposite motion as in back bouncing. Instead of opening up at the hips, tuck knees under chest."],
                ["Front Bounce Shaped", "Front Tuck Front", "At the peak of the bounce, snap into a tuck, pike or straddle."],
                ["Toilet Roll", "Front 360| Front", "Twisting from front around to front. May cause injury including but not limited to face and pride."]
            ],
            "Rotations - Longitudinal (Twist |), Lateral (Somersault -) & Dorsal (+)": [
                ["Front to Back", "Front 180- Back", "Push with hands and kick down toes to swing your legs under."],
                ["Turntable", "Front 360+ Front", "Push hands away sideways and whip knees in tight to generate rotation."],
                ["Cruise  Front", "180- & 180| Front", "From front, a 1/2 somersault rotations with a 1/2 twist"],
                ["Full Twisting Cruise", "Front 180- & 360| Back", "From front, a 1/2 somersault rotations with a full twist to back"],
                ["Cruise Plus Front", "180- & 540| Front", "From front, a 1/2 somersault rotations with 1&1/2 twists to front"]
            ]
        },
        "linear_progression": [
            ["Front Somersault", "Feet 360- Feet", "Once you eliminate the impossible, whatever remains, no matter how improbable, must be the truth."]
        ]
    },
    {
        "name": "Back Drop",
        "latteral_progressions": {
            "Variations In": [
                ["Half to back", "", "Description"],
                ["Full to back", "", "Description"]
            ],
            "Variations Out": [
                ["Half to feet", "", "Description"],
                ["Full to feet", "", "Description"],
                ["1 and a half to feet", "", "Description"]
            ],
            "Front Bouncing Shapes and Rotations": [
                ["Back bouncing", "", "Description"],
                ["Back tuck", "", "Description"],
                ["Back pike", "", "Description"],
                ["Back straddle", "", "Description"]
            ],
            "Rotations - Longitudinal (Twist |), Lateral (Somersault -) & Dorsal (+)": [
                ["Back to Front", "", "Description"],
                ["Cradle (back half to back, 1/2 somersault rotation plus half twist rotation)", "", "Description"],
                ["Reverse cradle (Bluish https://www.youtube.com/watch?v=QglYuq7DaYg)(Back pullover half twist to back)", "", "Description"],
                ["Back full to front (1/2 somersault rotation plus full twist rotation)", "", "Description"],
                ["Back 1 and a half to back (1/2 somersault rotation plus 1&1/2 twist rotation)", "", "Description"]
            ],
            "axis rotation": [
                ["Cat twist (back to back, no somi, only 1 full twist rotation)", "", "Description"],
                ["Double cat twist (back to back, no somi, 2 full twist rotation)", "", "Description"],
                ["Toilet bowl (Back to back dorsal axis. Flat back landing)", "", "Description"]
            ]
        },
        "linear_progression": [
            ["Back Somersault", "", "Description"]
        ]
    },
    {
        "name": "Front Somersault",
        "prereq": [
            "Hands & knees, hand stand, forward roll out",
            "3/4 turnover to back (no hands)",
            "Hands & knees somersault to feet",
            "From feet to back"
        ],
        "latteral_progressions": {
            "Variations In": [
                ["Arabian", "3/4 to back Feet 180| 270- Back", "Words words words, etc."],
                ["Arabian", "Feet 180| 360- Feet", "Words words words, etc."]
            ],
            "Variations Out": [
                ["Baraini", "Feet 360- 180| Feet", "Words words words, etc."],
                ["Full Front", "Feet 360- 360| Feet", "Words words words, etc."],
                ["Rudi (1 & 1/2)", "Feet 360- 540| Feet", "Words words words, etc."]
            ],
            "Starting Position": [
                ["Dolphin", "Seat 270- Feet ", "Words words words, etc."],
                ["Front Kaboom", "Front 270- Feet", "Words words words, etc."]
            ],
            "Ending Position": [
                ["Front to Face", "Feet 450- Front", "Words words words, etc."]
            ]
        },
        "linear_progression": [
            ["Crash Dive", "", "Description"]
        ]
    },
    {
        "name": "Back Somersault",
        "prereq": [
            "Backwards roll",
            "3/4 back pullover"
        ],
        "latteral_progressions": {
            "Variations Out": [
                ["Rodeo", "", "Description"],
                ["Back full", "", "Description"]
            ],
            "Variations In": [
                ["*Starting front and then twist. what would that even look like....*", "", "Description"]
            ],
            "Shapes": [
                ["Pike back", "", "Description"],
                ["Straight back", "", "Description"]
            ],
            "Ending Position": [
                ["Back to seat", "", "Description"],
                ["Back to back", "", "Description"]
            ],
            "Starting Position":  [
                ["Back Kaboom (From back)", "", "Description"]
            ]
        },
        "linear_progression": [
            ["Lazy Back", "", "Description"]
        ]
    },
    {
        "name": "Crash Dive",
        "prereq": [
            "Hands & knees crash dive"
        ],
        "latteral_progressions": {
            "Variations In": [
                ["Half twist to crash dive", "", "Description"]
            ],
            "Variations Out": [
                ["Bounce roll (Porpoise)", "", "Description"],
                ["Full twisting bounce roll (back drop full twist to feet and crash dive in one move)", "", "Description"]
            ]
        },
        "linear_progression": [
            ["Ball Out", "", "Description"]
        ]
    },
    {
        "name": "Lazy Back",
        "prereq": [
            "A fair controlled back somi"
        ],
        "latteral_progressions": {
            got_nothin: [
            ]
        },
        "linear_progression": [
            ["Cody", "", "Description"]
        ]
    },
    {
        "name": "Ball Out",
        "prereq": [
            "Front S/S",
            "Solid back drop"
        ],
        "latteral_progressions": {
            "Variations Out": [
                ["Baraini", "", "Describe"],
                ["Full front ball out", "", "Describe"],
                ["Baby fliff (cradle, back pull-over)", "", "Describe"],
                ["Rudi ball out", "", "Describe"],
                ["Randi ball out", "", "Describe"],
                ["Adolf Ball out", "", "Describe"],
                ["Half out ball out", "", "Describe"]
            ],
            "Shapes": [
                ["Straight front", "", "Descript"],
                ["Straight baraini ball out", "", "Descript"]
            ],
        },
        "linear_progression": [
            ["1 & 3/4 Front", "", ""]
        ]
    },
    {
        "name": "Cody",
        "prereq": [
            "Solid tuck back"
        ],
        "latteral_progressions": {
            "Variations Out": [
                ["Full twisting cody to stomach (front to front)", "", "Description"],
                ["Full cody", "", "Description"],
                ["Appltini (double twisting cody)", "", "Description"]
            ],
            shapes: [
                ["Straight front", "", "Description"],
                ["Straight baraini ball out", "", "Description"]
            ],
        },
        "linear_progression": [
            ["Double Back", "", "Description"]
        ]
    },
    {
        "name": "Double Front",
        "prereq": [
            "1 & 3/4 Front"
        ],
        "latteral_progressions": {
            "Variations Out": [
            ],
            "Shapes": [
            ],
        },
        "linear_progression": [
            ["Double Front", "", "Description"]
        ]
    },
    {
        "name": "Double Back",
        "prereq": [
            "Back s/s to back, back pullover",
            "Multiple back somis in a row"
        ],
        "latteral_progressions": {
            "Variations Out": [
            ],
            "Shapes": [
            ],
        },
        "linear_progression": [
            ["Double Front", "", "Description"]
        ]

    }
];