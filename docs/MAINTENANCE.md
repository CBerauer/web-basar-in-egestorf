# Basar-in-Egestorf Website - Maintenance Guide

## 📋 Twice-Yearly Update Checklist

### Two Weeks Before Each Basar:

1. **Open** `config.js` in your editor
2. **Update these fields:**
   ```javascript
   nextBasar: 'spring',  // Change to 'spring' or 'fall'
   ```
   
   For Spring Basar (typically March):
   ```javascript
   spring: {
       date: "Samstag, 08.03.2026",           // Update year and date
       time: "14:30 bis 16:30 Uhr",           // Update if time changes
       registrationOpenDate: "Donnerstag, 19.02.2026",  // Registration opens 2 weeks before
       registrationOpenTime: "08:00",         // Time registration opens (24h format HH:MM)
       registrationURL: "https://..."         // Update if Google Form changes
   }
   ```
   
   For Fall Basar (typically September):
   ```javascript
   fall: {
       date: "Samstag, 06.09.2026",
       time: "14:30 bis 16:30 Uhr",
       registrationOpenDate: "Donnerstag, 20.08.2026",
       registrationOpenTime: "08:00",
       registrationURL: "https://..."
   }
   ```

3. **Save** `config.js`
4. **Upload** `config.js` to your web server
5. **Test** the website - countdown timer will automatically show and count down to registration opening!

### When Registration is Full:

1. **Open** `config.js`
2. **Change ONE line:**
   ```javascript
   registrationFull: true,  // Shows "maximum reached" message
   ```
3. **Save and upload** - registration button disappears, message shows

### After the Basar:

1. **Open** `config.js`
2. **Switch to next season and reset:**
   ```javascript
   nextBasar: 'fall',        // or 'spring'
   registrationFull: false,   // Reset for next basar
   ```
3. **Update the upcoming season's dates**
4. **Save and upload**

---

## 🗂️ File Structure

### Production Files (These are your live website):
```
/
├── config.js                    ← Update this for dates!
├── index.html                   ← Homepage
└── html/
    ├── style-modern.css         ← Main stylesheet
    ├── anmeldung.html           ← Registration page
    ├── termine.html             ← Dates page
    ├── infos.html               ← Info page
    ├── galerie.html             ← Photo gallery
    ├── team.html                ← About team
    ├── kontakt.html             ← Contact page
    └── anfahrt.html             ← Directions
```

### Old Files (Can be archived/deleted):
```
├── index_1.html, index_1_Vorher.html
├── anmeldung_*.html (12 old versions!)
├── termine_Fruehjahr.html, termine_Herbst.html
└── anmeldung-formular*.html
```

---

## 🔧 Common Tasks

### Change Google Forms URL:
1. Create new Google Form
2. Get the embed URL
3. Open `config.js`
4. Update `registrationURL` for spring or fall
5. Save and upload

### Update Colors/Styling:
1. Open `html/style-modern.css`
2. Change CSS variables or colors
3. Save and upload

### Add New Photos to Gallery:
1. Upload photo to `assets/images/autogen/`
2. Open `html/galerie.html`
3. Add new `<div class="galerie-item">` block:
   ```html
   <div class="galerie-item">
       <img src="../assets/images/autogen/YOUR_NEW_PHOTO.jpg" alt="Description">
       <p><strong>... your caption ...!</strong></p>
   </div>
   ```

---

## 🚨 Troubleshooting

### Problem: Dates not updating
- **Check:** Did you upload `config.js` to the server?
- **Check:** Is the file named exactly `config.js`?
- **Check:** Clear browser cache (Ctrl+F5)

### Problem: Registration button not showing
- **Check:** Is `registrationOpen: true` in config.js?
- **Check:** Is `registrationFull: false` in config.js?
- **Check:** Is `registrationURL` correct?

### Problem: Wrong season showing
- **Check:** Is `nextBasar` set to 'spring' or 'fall'?
- **Check:** Browser cache cleared?

---

## 📅 Typical Timeline

### 6 Weeks Before Basar:
- Update `config.js` with new dates
- Set `registrationOpen: false` (registration not yet open)
- Upload changes

### 2 Weeks Before Basar:
- Set `registrationOpen: true`
- Upload `config.js`
- Test registration link

### When Full:
- Set `registrationFull: true`
- Upload `config.js`

### Day After Basar:
- Switch `nextBasar` to next season
- Set `registrationOpen: false`
- Set `registrationFull: false`
- Update next season's dates
- Upload `config.js`

---

## 💾 Backup

### Before Making Changes:
1. Download current `config.js`
2. Save as `config-backup-YYYY-MM-DD.js`
3. Make your changes
4. Upload new version

### If Something Goes Wrong:
1. Upload your backup file
2. Rename it back to `config.js`
3. Everything returns to previous state

---

## 📞 Quick Reference

### Most Common Update (Dates):
```javascript
// Edit config.js - Only these lines:
nextBasar: 'spring',               // or 'fall'
date: "Samstag, DD.MM.YYYY",
registrationOpen: true,            // true = show button
registrationFull: false,           // false = allow registration
```

### Enable Registration:
```javascript
registrationOpen: true,
```

### Disable Registration (Full):
```javascript
registrationFull: true,
```

### Close Registration (After Event):
```javascript
registrationOpen: false,
registrationFull: false,
```

---

## ✅ Testing After Changes

1. Visit website homepage
2. Check dates are correct
3. Click registration link (if enabled)
4. Test on mobile phone
5. Check all navigation links work

---

## 📊 What Changed from Old Site?

### Before:
- ❌ Edit 15+ HTML files for date changes
- ❌ Create separate pages for "full" messages
- ❌ Copy/paste everywhere
- ❌ 2 hours per update
- ❌ Easy to make mistakes

### Now:
- ✅ Edit 1 file (`config.js`) for date changes
- ✅ Automatic "full" message toggle
- ✅ Change once, updates everywhere
- ✅ 5 minutes per update
- ✅ Hard to make mistakes

---

## 🎓 For Technical Users

### To Add New Feature:
1. Edit relevant HTML file in `html/` folder
2. Add CSS to `html/style-modern.css` if needed
3. JavaScript goes in `config.js` or inline `<script>` tags
4. Test locally before uploading

### To Update Navigation Images:
- Images are in `assets/images/autogen/`
- Each nav item has: `*_Noffline.png`, `*_NRonline.png`, `*_Honline.png`, `*_HRonline.png`
- N = Normal, H = Highlighted (active), R = Rollover

---

## 📝 Support Contacts

- Email: basar-in-egestorf@web.de
- For technical help, refer to COMPARISON.md file

---

**Last Updated:** February 2026
**Version:** 2.0 (Modernized)