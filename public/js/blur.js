const allowedTime = 10 * 1000

const testLastActive = localStorage.getItem('lastActive')
if (testLastActive !== null) {
  //console.log('Дані знайдено:', data);
} else {
  //console.log('Дані відсутні');
  blurSite()
}

let isBlured = true

// Функція для розмиття контейнера
function blurSite() {
    document.body.style.filter = 'blur(7px)';
}

// Функція для зняття розмиття
function unblurSite() {
    document.body.style.filter = 'none';
}

function checkBlur() 
{
    let lastActive = parseInt(localStorage.getItem('lastActive'));
    let timePassed = Date.now() - lastActive

    if (timePassed > allowedTime) { // 5 хвилин в мілісекундах
        blurSite()
        blockSelection()
        isBlured = true
    } else {
        console.log('time left', miliToTime(allowedTime - timePassed))
        unblurSite()
        allowSelection()
        isBlured = false
    }
}

// Ініціалізація таймера для розмиття
checkBlur()
setInterval(checkBlur, 1000); // Кожні 5 хвилин (300000 мілісекунд)

// Зберігаємо натиснуті цифри в масив
let pressedNumbers = [];

document.addEventListener('keydown', (event) => {

      // Функція для перевірки послідовності цифр
      const checkSequence = () => {
         // console.log('pressedNumbers', pressedNumbers)
        if (pressedNumbers.join('') === '5214') {
          unblurSite();
          localStorage.setItem('lastActive', Date.now());
          isBlured = false
          pressedNumbers = []
        }
      };
  
      // Додаємо натиснуту цифру в масив
      if (event.key >= '0' && event.key <= '9') {
        //console.log("jj", event.key)
        pressedNumbers.push(event.key);
        // Перевіряємо послідовність після кожної натиснутої цифри
        checkSequence();
      } else {
        // Якщо натиснута не цифра, очищаємо масив
        pressedNumbers.length = 0;
      }
    
});

// При кожній активності користувача оновлюємо час останньої активності
document.addEventListener('mousemove', () => {
    if(!isBlured) {
        localStorage.setItem('lastActive', Date.now());
    }
});

document.addEventListener('click', (event) => {
    if(isBlured) {
        event.preventDefault()
    }
});

document.addEventListener('contextmenu', (event) => {
    if(isBlured) {
        event.preventDefault();
    }
});


window.addEventListener("wheel", (e) => {
    if(isBlured) {
        e.preventDefault()
    }
}, { passive:false })

function blockSelection() {
    document.body.style.userSelect = 'none';
    document.onselectstart = function() { return false; };
    document.oncopy = function() { return false; };
    document.oncut = function() { return false;   
   };
}
  
function allowSelection() {
    document.body.style.userSelect = 'auto';
    document.onselectstart = null;
    document.oncopy = null;
    document.oncut = null;
}

function miliToTime(milliseconds) {
    // Обчислюємо кількість секунд
    const seconds = Math.floor(milliseconds / 1000);
    // Обчислюємо кількість хвилин і секунд
    const minutes = Math.floor(seconds / 60);
    const remainingSeconds = seconds % 60;
  
    // Формуємо рядок з результатом, використовуючи padStart() для додавання провідних нулів
    return `${minutes.toString().padStart(2, '0')}:${remainingSeconds.toString().padStart(2, '0')}`;
}
