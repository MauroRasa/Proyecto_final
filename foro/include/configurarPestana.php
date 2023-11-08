<?php

function configuracion(){
echo '<div id="overlay">
    <button id="closeButton" onclick="closeOverlay();">
        <span class="material-symbols-outlined">close</span>
    </button>

        <div class="todoElTabConfiguracion">
            <div class="tabConfiguracion" id="tabConfiguracion">
                <div class="tabConfiguracion-container">
                    <button class="tablinksConfiguracion active" onclick="openTabConfiguracion(event, \'TabConfiguracion1\')">Tab 1</button>
                    <button class="tablinksConfiguracion" onclick="openTabConfiguracion(event, \'TabConfiguracion2\')">Tab 2</button>
                    <button class="tablinksConfiguracion" onclick="openTabConfiguracion(event, \'TabConfiguracion3\')">Tab 3</button>
               </div>
            </div>
            
            <div id="TabConfiguracion1" class="tabcontentConfiguracion" style="display: block;">
                <p>Tab1</p>
            </div>
            
            <div id="TabConfiguracion2" class="tabcontentConfiguracion">
                <p>Tab2</p>
            </div>
            
            <div id="TabConfiguracion3" class="tabcontentConfiguracion">
                <p>Tab3</p>
            </div>
        </div>
    </div>
    ';
    ?>
    <style>
        .todoElTabConfiguracion{
            display: flex;
            justify-content: center;
        }
        .tabConfiguracion{
            position: absolute;
        }
        #TabConfiguracion2{
            display: none;
        }
        #TabConfiguracion3{
            display: none;
        }
    </style>
        <script>
            function openTabConfiguracion(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName('tabcontentConfiguracion');
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = 'none';
            }
            tablinks = document.getElementsByClassName('tablinksConfiguracion');
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(' active', '');
            }
            document.getElementById(tabName).style.display = 'block';
            evt.currentTarget.className += ' active';

            // Actualiza isOverTab1 dependiendo del tabName actual
            isOverTab1 = tabName === 'TabConfiguracion1';
        }
        </script>
    <?php
}


function botonDelete(){
    echo '
        <button class="botonDeletePestaña" id="botonDeletePestaña"  onclick="deletePantalla_izq(this)">
            <span class="material-symbols-outlined">delete</span>
        </button>
';
}
?>