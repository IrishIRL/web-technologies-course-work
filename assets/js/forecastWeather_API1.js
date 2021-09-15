var temp = document.querySelector('#currentWeatherTemp');
var img = document.querySelector('#currentWeatherImage');
var currWeatherDetails = document.querySelector('#currentWeatherOther');
var sunrise = document.querySelector('#sunriseTime');
var sunset = document.querySelector('#sunsetTime');
var dayWeatherTime = document.querySelector('#dayWeatherTime');
var dayWeatherImg = document.querySelector('#dayWeatherImg');
var weekWeatherContainer = document.querySelector('#weekWeather');
var table = document.querySelector('#weekForecast');

function chooseImageFromDescription(description) {
    switch (description) {
        case "clear sky":
            return '<img src="assets/img/icons/clearSky.svg" alt="Clear Sky">';    
        case "few clouds":
            return '<img src="assets/img/icons/fewClouds.svg" alt="Few Clouds">';
        case "overcast clouds":
        case "scattered clouds":
        case "broken clouds":
            return '<img src="assets/img/icons/clouds.svg" alt="Broken Clouds">';
        case "shower rain":
        case "moderate rain":
            return '<img src="assets/img/icons/showerRain.svg" alt="Shower Rain">';
        case "rain":
            return '<img src="assets/img/icons/rain.svg" alt="Rain">';
        case "thunderstorm":
            return '<img src="assets/img/icons/thunderstorm.svg" alt="Thunderstorm">';
        case "snow":
        case "light snow":
            return '<img src="assets/img/icons/snow.svg" alt="Snow">';
        case "mist":
            return '<img src="assets/img/icons/mist.svg" alt="Mist">';
        case "rain and snow":
            return '<img src="assets/img/icons/rainAndSnow.svg" alt="Rain and Snow">';
        case "light rain":
            return '<img src="assets/img/icons/lightRain.svg" alt="Light Rain">';
        default:
            return "Unknown weather... PRAY!!";
    }
}

function convertWindDegToValue(degrees) {
    switch (degrees) {
        case 350:
        case 360:
        case 10:
            return "North";
        
        case 20:
        case 30:
            return "North-northeast";
        
        case 40:
        case 50:
            return "Northeast";
        
        case 60:
        case 70:
            return "East-northeast";
        
        case 80:
        case 90:
        case 100:
            return "East";
        
        case 110:
        case 120:
            return "East-southeast";
        
        case 130:
        case 140:
            return "Southeast";
        
        case 150:
        case 160:
            return "South-southeast";
        
        case 170:
        case 180:
        case 190:
            return "South";
        
        case 200:
        case 210:
            return "South-southwest";
        
        case 220:
        case 230:
            return "Southwest";
        
        case 240:
        case 250:
            return "West-southwest";
        
        case 260:
        case 270:
        case 280:
            return "West";
        
        case 290:
        case 300:
            return "West-northwest";
        
        case 310:
        case 320:
            return "Nortwest";
        
        case 330:
        case 340:
            return "North-northwest";
        
        default:
            return "Unknown";
    }
}

function convertUNIXToTime(dateStamp) {
    date = new Date(dateStamp*1000);
    var hour = "0" + date.getHours();
    var minutes = "0" + date.getMinutes();

    return `${hour.substr(-2)}:${minutes.substr(-2)}`;
}

function convertUNIXToDate(dateStamp) {
    date = new Date(dateStamp*1000);
    var year = date.getFullYear();
    var month = "0" + (date.getMonth() + 1);
    var day = "0" + date.getDate();

    return `${day.substr(-2)}.${month.substr(-2)}.${year}`;
}

function convertUNIXToDateTime(dateStamp) {
    date = new Date(dateStamp*1000);

    var year = date.getFullYear();
    var month = "0" + (date.getMonth() + 1);
    var day = "0" + date.getDate();
    var hour = "0" + date.getHours();
    var minutes = "0" + date.getMinutes();

    return `${day.substr(-2)}.${month.substr(-2)}.${year} ${hour.substr(-2)}:${minutes.substr(-2)}`;
}

function convertUNIXToWeekDay(dateStamp) {
    daysOfTheWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    date = new Date(dateStamp*1000);
    return daysOfTheWeek[date.getDay()];
}

function createWeekWeatherDay(date, temperature, description) {
    return `<div class="weekWeatherDay">
    <div class="weekWeatherDate">${date}</div>
    <div class="weekWeatherImage">${description}</div>
    <div class="weekWeatherTemp">${Math.round(temperature-273.15)}\xB0C</div></div>`;
}

fetch('https://api.openweathermap.org/data/2.5/onecall?lat=59.437&lon=24.7535' +
        '&appid=xxx')
    .then(response => response.json())
    .then(
        data => {
            console.log(data);
            var weatherDesc = data['hourly'][0]['weather'][0]['description'];
            img.innerHTML = chooseImageFromDescription(weatherDesc);

            var tempValue = data['current']['temp'];
            temp.innerHTML = `${Math.round(tempValue-273.15)}\xB0C`; //Removed <hr style="display:block; margin:3% 0 0 0;">

            var windSpeed = data['current']['wind_speed'];
            var windDir = data['current']['wind_deg'];
            var humidityValue = data['current']['humidity'];
            var precValue = data['hourly'][0]['pop'];
            currWeatherDetails.innerHTML = `Wind: ${convertWindDegToValue(windDir)}, 
            ${windSpeed} m/s<br>Humidity: ${humidityValue}%<br>
            Chance of precipitation: ${Math.round(precValue*100)}%`;

            var sunriseTime = data['current']['sunrise'];
            sunrise.innerHTML = `Sunrise<br>${convertUNIXToTime(sunriseTime)}`;

            var sunsetTime = data['current']['sunset'];
            sunset.innerHTML = `Sunset<br>${convertUNIXToTime(sunsetTime)}`;

            var tableColumns1 = "";
            for (var i=0; i<9; i++) {
                tableColumns1 += `<td>${convertUNIXToTime(data['hourly'][i*3]['dt'])}</td>`;
            }
            dayWeatherTime.innerHTML = tableColumns1;
            
            var tableColumns2 = "";
            for (var i=0; i<9; i++) {
                //console.log(data['hourly'][i*3]['weather'][0]['description']);
                tableColumns2 += `<td>
                ${chooseImageFromDescription(data['hourly'][i*3]['weather'][0]['description'])}</td>`;
            }
            dayWeatherImg.innerHTML = tableColumns2;

            /*for (var i=1; i<8; i++) {
                date = `${convertUNIXToWeekDay(data['daily'][i]['dt'])}, ${convertUNIXToDate(data['daily'][i]['dt'])}`;
                temperature = data['daily'][i]['temp']['day'];
                description = data['daily'][i]['weather'][0]['description'];
                imageFromDescription = chooseImageFromDescription(description);
                //console.log(date);
                console.log(description);
                weekWeather += createWeekWeatherDay(date, temperature, imageFromDescription);
            }
            weekWeatherContainer.innerHTML = weekWeather;*/

            for (var i=1; i<8; i++) {
                date = `${convertUNIXToWeekDay(data['daily'][i]['dt'])}, ${convertUNIXToDate(data['daily'][i]['dt'])}`;
                temperature = data['daily'][i]['temp']['day'];
                description = data['daily'][i]['weather'][0]['description'];
                imageFromDescription = chooseImageFromDescription(description);

                row = table.insertRow(i-1);
                row.insertCell(0).innerHTML = date;
                row.insertCell(1).innerHTML = `${Math.round(temperature-273.15)}\xB0C`;
                row.insertCell(2).innerHTML = imageFromDescription;
            }
        }
    )
    .catch(err => alert(err));