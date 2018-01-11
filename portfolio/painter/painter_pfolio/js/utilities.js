'use strict';   // Mode strict du JavaScript

/*************************************************************************************************//* *********************************** FONCTIONS UTILITAIRES **************************** */
// *********************************************************************************************/*

// fonction pour initialiser les evenement
function initEvent(selector, event, myFunction ){

    document.querySelector(selector).addEventListener(event, myFunction);

}
