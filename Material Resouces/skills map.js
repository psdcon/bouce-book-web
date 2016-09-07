var groups = [
    {
        name: 'Straight Bounce',
        prereq: ['Straight bounce and stop'],
        latteral_progressions: ['Tuck', 'Pike ', 'Straddle'],
        linear_progression: ['Twist']
    },
    {
        name: 'Twist',
        prereq: ['Straight bounce'],
        latteral_progressions: ['Half twist', 'Full twist ', '1&1/2 twist'],
        linear_progression: ['Seat']
    },
    {
        name: 'Seat',
        latteral_progressions: {
            in: ['Half to seat', 'Full to seat'],
            out: ['Half to feet', 'Full to feet', '1 and a half to feet'],
            'twist and somi rot': ['Swivel hips (Seat to seat with half twist and a sort of half somi rotation)'],
            'axis rotation': ['Roller (Seat to seat, full twist about longitudinal)'],
        },
        linear_progression: ['Front drop', 'Back Drop']
    },
    {
        name: 'Front Drop',
        latteral_progressions: {
            in: ['Airplane (Half to front)', 'Full to front'],
            out: ['Half to feet', 'Full to feet', '1 and a half to feet'],
            shapes: ['Front bouncing', 'Front tuck', 'Front pike', 'Front straddle'],
            'twist and somi rot': ['Front to back', 'Cruise (front half to front, 2*1/4 Somersault rotations and twist rotation)', 'Full twisting cruise (Front full to back)', 'Cruise Plus (Front 1 and a half to front)', 'Double twisting cruise', ' Cruise plus plus (Cruise Control)(2 and a half twisting from front to front)'],
            'axis rotation': ['Toilet roll (Front to front, No somi, Only twist rotation)', 'Turn table (Front to front dorsal axis)']
        },
        linear_progression: ['Front Somersault']
    },
    {
        name: 'Back Drop',
        latteral_progressions: {
            in: ['Half to back', 'Full to back'],
            out: ['Half to feet', 'Full to feet', '1 and a half to feet'],
            shapes: ['Back bouncing', 'Back tuck', 'Back pike', 'Back straddle'],
            'twist and somi rot': ['Back to Front', 'Cradle (back half to back, 1/2 somersault rotation plus half twist rotation)', 'Reverse cradle (Bluish https://www.youtube.com/watch?v=QglYuq7DaYg)(Back pullover half twist to back)', 'Back full to front (1/2 somersault rotation plus full twist rotation)', 'Back 1 and a half to back (1/2 somersault rotation plus 1&1/2 twist rotation)'],
            'axis rotation': ['Cat twist (back to back, no somi, only 1 full twist rotation)', 'Double cat twist (back to back, no somi, 2 full twist rotation)', 'Toilet bowl (Back to back dorsal axis. Flat back landing)']
        },
        linear_progression: ['Back Somersault']
    },
    {
        name: 'Front Somersault',
        prereq: ['Hands & knees, hand stand, forward roll out', '3/4 turnover to back (no hands)', 'Hands & knees somersault to feet', 'From feet to back'],
        latteral_progressions: {
            out: ['Baraini', 'Full front', 'Rudi (1 & 1/2)', 'Randi (2 & 1/2)'],
            in: ['Arabian 3/4 to back','Arabian'],
            'shapes': ['Pike front', 'Straight front'],
            'ending pos': ['Front to face'],
            'starting pos':  ['Front Kaboom (From front)', 'Dolphin (From seat)']
        },
        linear_progression: ['Crash Dive']
    },
    {
        name: 'Back Somersault',
        prereq: ['Backwards roll', '3/4 back pullover'],
        latteral_progressions: {
            out: ['Rodeo', 'Back full'],
            in: ['*Starting front and then twist. what would that even look like....*'],
            shapes: ['Pike back', 'Straight back'],
            'ending pos': ['Back to seat', 'Back to back'],
            'starting pos':  ['Back Kaboom (From back)']
        },
        linear_progression: ['Lazy Back']
    },
    {
        name: 'Crash Dive',
        prereq: ['Hands & knees crash dive'],
        latteral_progressions: {
            in: ['Half twist to crash dive'],
            out: ['Bounce roll (Porpoise)', 'Full twisting bounce roll (back drop full twist to feet and crash dive in one move)']
        },
        linear_progression: ['Ball Out']
    },
    {
        name: 'Lazy Back',
        prereq: ['A fair controlled back somi'],
        latteral_progressions: {
            got_nothin: ['']
        },
        linear_progression: ['Cody']
    },
    {
        name: 'Ball Out',
        prereq: ['Front S/S', 'Solid back drop'],
        latteral_progressions: {
            out: ['Baraini', 'Full front ball out', 'Baby fliff (cradle, back pull-over)', 'Rudi ball out', 'Randi ball out', 'Adolf Ball out', 'Half out ball out'],
            shapes: ['Straight front', 'Straight baraini ball out'],
        },
        linear_progression: ['1 & 3/4 Front']
    },
    {
        name: 'Cody',
        prereq: ['Solid tuck back'],
        latteral_progressions: {
            out: ['Full twisting cody to stomach (front to front)', 'Full cody', 'Appltini (double twisting cody)'],
            shapes: ['Straight front', 'Straight baraini ball out'],
        },
        linear_progression: ['Double Back']
    },
    {
        name: 'Double Front',
        prereq: ['1 & 3/4 Front'],
        latteral_progressions: {
            out: [],
            shapes: [],
        },
        linear_progression: ['Double Front']
    },{
        name: 'Double Back',
        prereq: ['Back s/s to back, back pullover', 'Multiple back somis in a row'],
        latteral_progressions: {
            out: [],
            shapes: [],
        },
        linear_progression: ['Double Front']

    }
];