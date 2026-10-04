// Basar Configuration - Update this file twice per year
const basarConfig = {
    // Spring Basar
    spring: {
        date: "Samstag, 06.03.2027",
        time: "14:30 bis 16:30 Uhr",
        registrationOpenDate: "Donnerstag, 18.02.2026",
        registrationOpenTime: "08:00",
        registrationFull: false,
        registrationURL: "https://docs.google.com/forms/d/e/1FAIpQLSdLZrI73DGTP1ex_ISVV30VSuIKdFVEyUIYihV16jyZvrUSPg/viewform"
    },

    // Fall Basar
    fall: {
        date: "Samstag, 25.09.2027 (vorraussichtlich)",
        time: "14:30 bis 16:30 Uhr",
        registrationOpenDate: "Donnerstag, 09.09.2027",
        registrationOpenTime: "08:00",
        registrationFull: true,
        registrationURL: "https://docs.google.com/forms/d/e/1FAIpQLSdLZrI73DGTP1ex_ISVV30VSuIKdFVEyUIYihV16jyZvrUSPg/viewform"
    },

    // Location info (rarely changes)
    location: {
        venue: "Fritz-Ahrberg-Halle",
        subVenue: "(Turnhalle Ernst-Reuter-Schule)",
        address: "Nienstedter Str. 15",
        city: "Barsinghausen / Egestorf"
    },

    // Which basar is next? 'spring' or 'fall'
    nextBasar: 'spring',

    // Get current basar info
    getCurrent: function() {
        return this[this.nextBasar];
    }
};
