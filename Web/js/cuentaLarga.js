function convertGregorian() {
    const day = parseInt(document.getElementById('day').value);
    const month = parseInt(document.getElementById('month').value) - 1;
    const year = parseInt(document.getElementById('year').value);
    const hour = document.getElementById('hour').value.split(':').map(Number);
    const date = new Date(year, month, day, hour[0], hour[1], hour[2]);

    const dayOfWeek = getDayOfWeek(date);
    document.getElementById('day-of-week').textContent = dayOfWeek;

    const julianDay = toJulian(date);
    document.getElementById('julian-day').value = julianDay;

    convertJulian();
}

function convertJulian() {
    const julianDay = parseFloat(document.getElementById('julian-day').value);
    const date = fromJulian(julianDay);

    document.getElementById('day').value = date.getDate();
    document.getElementById('month').value = date.getMonth() + 1;
    document.getElementById('year').value = date.getFullYear();
    document.getElementById('hour').value = date.toTimeString().split(' ')[0];

    const dayOfWeek = getDayOfWeek(date);
    document.getElementById('day-of-week').textContent = dayOfWeek;

    const gmtOffset = 584283;
    const wfOffset = 660208;

    const gmtDate = julianDay - gmtOffset;
    const wfDate = julianDay - wfOffset;

    const gmtMayaDate = toMaya(gmtDate);
    const wfMayaDate = toMaya(wfDate);

    displayMayaDate(gmtMayaDate, 'gmt');
    displayMayaDate(wfMayaDate, 'wf');
}

function toJulian(date) {
    return (date / 86400000) + 2440587.5;
}

function fromJulian(julianDay) {
    const date = new Date((julianDay - 2440587.5) * 86400000);
    return date;
}

function toMaya(julianDay) {
    const baktun = Math.floor(julianDay / 144000);
    const katun = Math.floor((julianDay % 144000) / 7200);
    const tun = Math.floor((julianDay % 7200) / 360);
    const uinal = Math.floor((julianDay % 360) / 20);
    const kin = Math.floor(julianDay % 20);

    const tzolkinDay = Math.floor(julianDay % 260);
    const tzolkinNumber = tzolkinDay % 13 + 1;
    const tzolkinName = tzolkinDay % 20 + 1;

    const haabDay = Math.floor(julianDay % 365);
    const haabMonth = Math.floor(haabDay / 20);
    const haabDayNumber = haabDay % 20;

    return { baktun, katun, tun, uinal, kin, tzolkinNumber, tzolkinName, haabDayNumber, haabMonth };
}

function displayMayaDate(date, prefix) {
    document.getElementById(`${prefix}-baktun`).textContent = date.baktun;
    document.getElementById(`${prefix}-katun`).textContent = date.katun;
    document.getElementById(`${prefix}-tun`).textContent = date.tun;
    document.getElementById(`${prefix}-uinal`).textContent = date.uinal;
    document.getElementById(`${prefix}-kin`).textContent = date.kin;
    document.getElementById(`${prefix}-tzolkin`).textContent = `${date.tzolkinNumber}.${date.tzolkinName}`;
    document.getElementById(`${prefix}-haab`).textContent = `${date.haabDayNumber}.${date.haabMonth}`;
}

function getDayOfWeek(date) {
    const days = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    return days[date.getDay()];
}


function formatHour(input) {
    var cleanedInput = input.value.replace(/[^\d]/g, '');

    // Eliminar cualquier carácter que no sea un número
    var cleanedInput = input.value.replace(/[^\d]/g, '');

    // Obtener las partes para hora, minuto y segundo
    var hours = cleanedInput.substring(0, 2);
    var minutes = cleanedInput.substring(2, 4);
    var seconds = cleanedInput.substring(4, 6);

    // Formatear las partes en el formato HH:MM:SS
    input.value = hours + ':' + minutes + ':' + seconds;

}