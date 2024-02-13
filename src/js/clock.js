function updateClock() {
    const now = new Date();
    const hours = now.getHours() % 12;
    const minutes = now.getMinutes();
    const seconds = now.getSeconds();

    const hourHand = document.getElementById("hour-hand");
    const minuteHand = document.getElementById("minute-hand");
    const secondHand = document.getElementById("second-hand");

    const hourDeg = (hours + minutes / 60) * 30; // 30 stepeni po satu
    const minuteDeg = minutes * 6; // 6 stepeni po minutu
    const secondDeg = seconds * 6; // 6 stepeni po sekundi

    hourHand.style.transform = `rotate(${hourDeg}deg)`;
    minuteHand.style.transform = `rotate(${minuteDeg}deg)`;
    secondHand.style.transform = `rotate(${secondDeg}deg)`;
}

// Update sata svaki sekund
setInterval(updateClock, 1000);

// Prvi poziv
updateClock();
