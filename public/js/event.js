document.addEventListener('DOMContentLoaded', function() {
    var lienConsulter = document.getElementById('lienConsulter');
    var containerRight = document.getElementById('container-right');
    var lienModifier = document.getElementById('lienModifier');

    lienConsulter.addEventListener('click', function(e) {
        e.preventDefault();
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'components/tableOrders.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Le contenu HTML du fichier "contenu.html" est chargé avec succès
                containerRight.innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    });

});

