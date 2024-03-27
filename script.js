function getIPAddress() {
  fetch('https://api.ipify.org?format=json')
      .then(response => response.json())
      .then(data => {
          document.getElementById('ip-address').textContent = `Your IP Address is: ${data.ip}`;
      })
      .catch(error => {
          console.error('Error fetching IP address:', error);
          document.getElementById('ip-address').textContent = 'Failed to fetch IP address';
      });
}

// Вызов функции при загрузке страницы
window.onload = getIPAddress;