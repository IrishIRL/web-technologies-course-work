var temp = document.querySelector('.degrees');
var wind = document.querySelector('.wind');
var humidity = document.querySelector('.humidity');
var precipitation = document.querySelector('.precipitation');
var img = document.querySelector('.weather_img');

fetch('https://api.openweathermap.org/data/2.5/onecall?lat=59.437&lon=24.7535' +
        '&appid=xxx')
    .then(response => response.json())
    .then(
        data => {
            console.log(data);
            var tempValue = data['current']['temp'];
            var windValue = data['current']['wind_speed'];
            var humidityValue = data['current']['humidity'];
            var precValue = data['hourly'][0]['pop'];
            var weatherDesc = data['current']['weather'][0]['description'];
            
            switch (weatherDesc) {
                case "clear sky":
                    img.innerHTML = '<img class="weather_img" src="assets/img/icons/clearSky.svg" alt="Clear Sky">';
                    break;
            
                case "few clouds":
                    img.innerHTML = '<img class="weather_img" src="assets/img/icons/fewClouds.svg" alt="Few Clouds">';
                    break;
                
                case "scattered clouds":
                    img.innerHTML = '<img class="weather_img" src="assets/img/icons/clouds.svg" alt="Scattered Clouds">';
                    break;
            
                case "broken clouds":
                    img.innerHTML = '<img class="weather_img" src="assets/img/icons/clouds.svg" alt="Broken Clouds">';
                    break;
                
                case "shower rain":
                    img.innerHTML = '<img class="weather_img" src="assets/img/icons/showerRain.svg" alt="Shower Rain">';
                    break;
                
                case "rain":
                    img.innerHTML = '<img class="weather_img" src="assets/img/icons/rain.svg" alt="Rain">';
                    break;
                
                case "thunderstorm":
                    img.innerHTML = '<img class="weather_img" src="assets/img/icons/thunderstorm.svg" alt="Thunderstorm">';
                    break;
                
                case "snow":
                    img.innerHTML = '<img class="weather_img" src="assets/img/icons/snow.svg" alt="Snow">';
                    break;
                
                case "mist":
                    img.innerHTML = '<img class="weather_img" src="assets/img/icons/mist.svg" alt="Mist">';
                    break;
                
                default:
                    img.innerHTML = "Unknown weather... PRAY!!";
                    break;
            }
            
            temp.innerHTML = `${Math.round(tempValue-273.15)}\xB0C`;
            wind.innerHTML = `${windValue}m/s`;
            humidity.innerHTML = `${humidityValue}%`;
            precipitation.innerHTML = `${precValue*100}%`;
        }
    )
    .catch(err => alert(err));