var table = document.querySelector('#weekForecast');

function chooseImageFromDescription2(description) {
    switch (description) {
        case 'Thunderstorm with light rain':
        case 'Thunderstorm with rain':
        case 'Thunderstorm with heavy rain':
        case 'Thunderstorm with light drizzle':
        case 'Thunderstorm with drizzle':
        case 'Thunderstorm with heavy drizzle':
        case 'Thunderstorm with Hail':
            return '<img src="assets/img/icons/thunderstorm.svg" alt="Thunderstorm">';
			
		case 'Moderate rain':
        case 'Drizzle':
            return '<img src="assets/img/icons/rain.svg" alt="Rain">';
			
		case 'Light shower rain':	
		case 'Light drizzle':
        case 'Light rain':
            return '<img src="assets/img/icons/lightRain.svg" alt="Light Rain">';
			
        case 'Freezing rain':
            return '<img src="assets/img/icons/rainAndSnow.svg" alt="Freezing rain">';
		
		case 'Heavy rain':
		case 'Heavy drizzle':
		case 'Heavy shower rain':
        case 'Shower rain':
            return '<img src="assets/img/icons/showerRain.svg" alt="Shower Rain">';

        case 'Light snow':
        case 'Snow':
        case 'Heavy snow':
            return '<img src="assets/img/icons/snow.svg" alt="Snow">';
        
        case 'Clear sky':
            return '<img src="assets/img/icons/clearSky.svg" alt="Clear Sky">';
        
        case 'Few clouds':
            return '<img src="assets/img/icons/fewClouds.svg" alt="Few Clouds">';
        
        case 'Scattered clouds':
        case 'Broken clouds':
        case 'Overcast clouds':
            return '<img src="assets/img/icons/clouds.svg" alt="Clouds">';
        
        case 'Fog':
        case 'Freezing fog':
            return '<img src="assets/img/icons/mist.svg" alt="Mist">';       
    }
}

fetch("https://api.weatherbit.io/v2.0/forecast/daily?lat=59.437&lon=24.7535&key=xxx")
    .then(response => response.json())
    .then(
        data => {
            console.log(data);
            
            for (var i=1; i<8; i++) {
                temp = data['data'][i]['temp'];
                weather = data['data'][i]['weather']['description'];

                table.rows[i-1].insertCell(3).innerHTML = `${temp}\xB0C`;
                table.rows[i-1].insertCell(4).innerHTML = chooseImageFromDescription2(weather);
            }
        }
    )