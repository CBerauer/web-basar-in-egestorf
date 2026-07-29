# Quick Update Guide - Keep This Handy!

## 🚀 Twice-Yearly Update (5 Minutes)

### File to Edit: `config.js`

### For Spring Basar (March):
1. Open `config.js`
2. Find these lines and update:
```javascript
nextBasar: 'spring',

spring: {
    date: "Samstag, 08.03.2026",              // ← Change year/date
    time: "14:30 bis 16:30 Uhr",
    registrationOpenDate: "Donnerstag, 19.02.2026",  // ← 2 weeks before basar
    registrationOpenTime: "08:00",            // ← Time registration opens (HH:MM)
    registrationFull: false,                  // ← false = accepting signups
    registrationURL: "https://docs.google.com/forms/..."  // ← Update if form changes
}
```
3. Save and upload `config.js`
4. Done! Countdown timer starts automatically and opens registration at the specified time.

### For Fall Basar (September):
```javascript
nextBasar: 'fall',

fall: {
    date: "Samstag, 06.09.2026",
    time: "14:30 bis 16:30 Uhr",
    registrationOpenDate: "Donnerstag, 20.08.2026",
    registrationOpenTime: "08:00",
    registrationFull: false,
    registrationURL: "https://docs.google.com/forms/..."
}
```

---

## 📋 Common Scenarios

### 2 Weeks Before Basar:
- Just set the dates! The countdown timer automatically appears and counts down to registration opening
- When the countdown reaches zero, the registration link appears automatically

### Registration Full:
```javascript
registrationFull: true,     // ← Shows "full" message instead of registration link
```

### After Basar (Prepare for Next Season):
```javascript
nextBasar: 'fall',          // ← Switch to next season
registrationFull: false,    // ← Reset for next basar
```

---

## ✅ Quick Checklist

**Two weeks before basar:**
- [ ] Update date in config.js
- [ ] Set registrationOpen: true
- [ ] Test Google Form link works
- [ ] Upload config.js
- [ ] Clear browser cache and test

**When registration fills:**
- [ ] Set registrationFull: true in config.js
- [ ] Upload config.js

**After basar:**
- [ ] Switch nextBasar to next season
- [ ] Set registrationOpen: false
- [ ] Update next season's date
- [ ] Upload config.js

---

## 🆘 Emergency: Undo Changes

1. Find your backup: `config-backup-DATE.js`
2. Rename it to: `config.js`
3. Upload to server
4. Everything returns to previous state

---

## 📞 That's It!

**Only 1 file to edit: `config.js`**
**All 8 pages update automatically!**

For detailed help, see MAINTENANCE.md
