function convertToMaya() {
    const number = document.getElementById('inputNumber').value;
    if (number < 0 || number > 99999) {
        alert('Por favor ingresa un número entre 0 y 99999.');
        return;
    }
    
    const mayaNumberContainer = document.getElementById('mayaNumber');
    mayaNumberContainer.innerHTML = '';

    const mayaDigits = convertToMayaDigits(number);

    mayaDigits.forEach(digit => {
        const mayaDigitDiv = document.createElement('div');
        mayaDigitDiv.className = 'maya-digit';

        if (digit === 0) {
            const shell = document.createElement('div');
            shell.className = 'shell';
            mayaDigitDiv.appendChild(shell);
        } else {
            const bars = Math.floor(digit / 5);
            const points = digit % 5;

            for (let i = 0; i < bars; i++) {
                const bar = document.createElement('div');
                bar.className = 'bar';
                mayaDigitDiv.appendChild(bar);
            }

            const pointsContainer = document.createElement('div');
            pointsContainer.className = 'points';
            for (let i = 0; i < points; i++) {
                const point = document.createElement('div');
                point.className = 'point';
                pointsContainer.appendChild(point);
            }
            mayaDigitDiv.appendChild(pointsContainer);
        }

        mayaNumberContainer.appendChild(mayaDigitDiv);
    });
}

function convertToMayaDigits(number) {
    const mayaDigits = [];
    const vigesimalPositions = [1, 20, 400, 8000, 160000];
    
    for (let i = vigesimalPositions.length - 1; i >= 0; i--) {
        const positionValue = vigesimalPositions[i];
        if (number >= positionValue) {
            const digit = Math.floor(number / positionValue);
            mayaDigits.push(digit);
            number %= positionValue;
        } else {
            if (mayaDigits.length > 0 || i === 0) {
                mayaDigits.push(0);
            }
        }
    }
    
    return mayaDigits.reverse();
}
