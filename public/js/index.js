function loadContent(content) {
    const url = `/dashboard/${content}`;
    fetch(url)
        .then(response => response.text())
        .then(html => {
            document.getElementById('dashboardContent').innerHTML = html;
            updateActiveLink(content);
        })
        .catch(error => console.error('Error loading the content:', error));
}

function updateActiveLink(content) {
    const links = document.querySelectorAll('.dash-nav-item a');
    links.forEach(link => {
        if (link.getAttribute('onclick').includes(content)) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });
}

document.addEventListener('DOMContentLoaded', function () {
    // Set default content load for Profile if none is active
    if (!document.querySelector('.dash-nav-item a.active')) {
        loadContent('profile'); // Load profile by default
    }
});

// profile picture 
fetch('/api/user')
    .then(response => response.json())
    .then(user => {
        console.log('User ID:', user.id, 'User Name:', user.name);
        var name = user.name;
        $(document).ready(function(){
            var initials = name.charAt(0); 
            $('#profileImage').text(initials); 
        });
    })
    .catch(error => console.error('Error fetching user data:', error));

// palette page -------------------------------------------------------------------------------------------

document.addEventListener('DOMContentLoaded', function() {
    generateColors();
});

document.addEventListener('keydown', function(event) {
    if (event.code === 'Space') {
        generateColors();
    }
});

function generateColors() {
    var palette = document.getElementById('color-palette');
    var colors = palette.querySelectorAll('.color');
    colors.forEach(function(color) {
        var generatedColor = getRandomColor();
        color.style.backgroundColor = generatedColor;
        updateColorInfo(color, generatedColor);
    });
}

function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

function updateColorInfo(colorElement, color) {
var hexCode = colorElement.querySelector('.hex-code');
var colorName = colorElement.querySelector('.color-name');

hexCode.textContent = color; // Set hex code text

// Fetch color name from The Color API
fetch(`https://www.thecolorapi.com/id?hex=${color.substring(1)}`) // Remove '#' for API call
   .then(response => response.json())
   .then(data => {
       colorName.textContent = data.name.value; // Set color name from API response
   })
   .catch(error => {
       console.error('Error fetching color name:', error);
       colorName.textContent = 'Unknown'; // Fallback text
   });
}

document.getElementById('color-palette').addEventListener('click', function(event) {
    var colorElement = event.target.closest('.color');
    if (!colorElement) return;

    var hexCode = colorElement.querySelector('.hex-code').textContent;

    if (event.target.classList.contains('color-hover-cancel')) {
        var palette = document.getElementById('color-palette');
        var colors = palette.querySelectorAll('.color');
        colors.forEach(function(color) {
            var colorIcons = color.querySelector('.color-icons');
            colorIcons.style.display = 'none';
            color.addEventListener('mouseenter', function() {
                colorIcons.style.display = 'flex';
            });
            color.addEventListener('mouseleave', function() {
                colorIcons.style.display = 'none';
            });
        });
    } else if (event.target.classList.contains('color-opacity')) {
        showColorShades(colorElement, hexCode);
    } else if (event.target.classList.contains('color-favourite')) {
        console.log('Hex code of the favorite color:', hexCode);
    } else if (event.target.classList.contains('color-lock')) {
        var icon = event.target;
        icon.classList.toggle('fa-unlock-alt');
        icon.classList.toggle('fa-lock');
    } else if (event.target.classList.contains('color-hexcode')) {
        copyToClipboard(hexCode);
    }
});

function showColorShades(colorElement, hexCode) {
    var shadesContainer = colorElement.querySelector('.color-shades-container');

    // Check if shades are already generated
    if (!colorElement.dataset.shadesGenerated) {
        shadesContainer.innerHTML = '';
        generateShades(colorElement, hexCode);
        colorElement.dataset.shadesGenerated = 'true';
    }

    shadesContainer.style.display = 'flex';
}

function generateShades(colorElement, hexCode) {
    var shadesContainer = colorElement.querySelector('.color-shades-container');
    var color = tinycolor(hexCode);

    // Clear previous shades
    shadesContainer.innerHTML = '';

    // Generate light shades
    for (var i = 10; i >= 0; i--) {
        var shade = color.clone().lighten(i * 5).toHexString();
        var shadeElement = document.createElement('div');
        shadeElement.className = 'color-shade';
        shadeElement.style.backgroundColor = shade;
        shadeElement.dataset.hex = shade;
        shadesContainer.appendChild(shadeElement);
    }

    // Generate dark shades
    for (var i = 1; i <= 10; i++) {
        var shade = color.clone().darken(i * 5).toHexString();
        var shadeElement = document.createElement('div');
        shadeElement.className = 'color-shade';
        shadeElement.style.backgroundColor = shade;
        shadeElement.dataset.hex = shade;
        shadesContainer.appendChild(shadeElement);
    }

    // Event delegation for shade clicks
    shadesContainer.addEventListener('click', function(event) {
        var shadeElement = event.target;
        if (shadeElement.classList.contains('color-shade')) {
            var selectedHex = shadeElement.dataset.hex;
            applyShade(colorElement, selectedHex);
            colorElement.dataset.selectedShade = selectedHex;
        }
    });
}

function applyShade(colorElement, hexCode) {
    var colorInfo = colorElement.querySelector('.color-info');
    var hexCodeDiv = colorInfo.querySelector('.hex-code');
    var colorNameDiv = colorInfo.querySelector('.color-name');

    colorElement.style.backgroundColor = hexCode;
    hexCodeDiv.textContent = hexCode;
    colorNameDiv.textContent = ntc.name(hexCode)[1];

    // Hide the shades container after selecting a shade
    colorElement.querySelector('.color-shades-container').style.display = 'none';

    // Save the selected shade to the color element
    colorElement.dataset.selectedShade = hexCode;
}

function copyToClipboard(text) {
    var dummy = document.createElement('textarea');
    document.body.appendChild(dummy);
    dummy.value = text;
    dummy.select();
    document.execCommand('copy');
    document.body.removeChild(dummy);
}
document.getElementById('savePaletteBtn').addEventListener('click', function() {
    var colors = document.querySelectorAll('.color-palette .color .hex-code');
    var colorDisplay = document.getElementById('colorDisplay');
    colorDisplay.innerHTML = ''; // Clear previous colors
    var arr= [];
    var i = 0;
    colors.forEach(function(hexCodeElement) {
        var colorBox = document.createElement('div');
        colorBox.className = 'color-display-box';
        colorBox.style.backgroundColor = hexCodeElement.textContent;
        arr[i] = hexCodeElement.textContent;
        i++;
        colorDisplay.appendChild(colorBox);
    });
    console.log(arr);
if (arr.length >= 5) {
    document.getElementById('color1').value = arr[0];
    document.getElementById('color2').value = arr[1];
    document.getElementById('color3').value = arr[2];
    document.getElementById('color4').value = arr[3];
    document.getElementById('color5').value = arr[4];
}
});




