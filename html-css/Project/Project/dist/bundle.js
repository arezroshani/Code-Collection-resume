/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/main.js":
/*!*********************!*\
  !*** ./src/main.js ***!
  \*********************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _style_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./style.css */ \"./src/style.css\");\n\nconsole.log(\"فونت vazirmatn لود شد!\");\ndocument.addEventListener(\"DOMContentLoaded\", function () {\n  console.log(\"main.js loaded\");\n\n  // Navbar\n  var nav = document.querySelector(\".nav\"),\n    searchIcon = document.querySelector(\"#searchIcon\"),\n    navOpenBtn = document.querySelector(\".navOpenBtn\"),\n    navCloseBtn = document.querySelector(\".navCloseBtn\");\n  if (searchIcon) {\n    searchIcon.addEventListener(\"click\", function () {\n      nav.classList.toggle(\"openSearch\");\n      nav.classList.remove(\"openNav\");\n      searchIcon.classList.toggle(\"uil-times\");\n      searchIcon.classList.toggle(\"uil-search\");\n    });\n  }\n  if (navOpenBtn) {\n    navOpenBtn.addEventListener(\"click\", function () {\n      nav.classList.add(\"openNav\");\n      nav.classList.remove(\"openSearch\");\n      searchIcon === null || searchIcon === void 0 || searchIcon.classList.replace(\"uil-times\", \"uil-search\");\n    });\n  }\n  if (navCloseBtn) {\n    navCloseBtn.addEventListener(\"click\", function () {\n      nav.classList.remove(\"openNav\");\n    });\n  }\n\n  // Input Floating Label\n  document.querySelectorAll('.input-box input').forEach(function (input) {\n    if (input.value.trim() !== \"\") {\n      input.classList.add('filled');\n    }\n    input.addEventListener('input', function () {\n      input.classList.toggle('filled', input.value.trim() !== \"\");\n    });\n  });\n\n  // کارت بانکی در paybill.html\n  var card = document.getElementById('creditCard');\n  var numberInput = document.getElementById('cardNumber');\n  var nameInput = document.getElementById('cardHolder');\n  var expInput = document.getElementById('expDate');\n  var cvvInput = document.getElementById('cvv');\n  var passwordInput = document.getElementById('password');\n  var numberPreview = document.getElementById('cardNumberPreview');\n  var namePreview = document.getElementById('cardHolderPreview');\n  var expPreview = document.getElementById('expDatePreview');\n  var cvvPreview = document.getElementById('cvvPreview');\n  if (numberInput && numberPreview) {\n    numberInput.addEventListener(\"input\", function () {\n      var val = numberInput.value.replace(/\\D/g, '').substring(0, 16);\n      numberInput.value = val.replace(/(.{4})/g, \"$1 \").trim();\n      numberPreview.textContent = numberInput.value || \"**** **** **** ****\";\n    });\n  }\n  if (nameInput && namePreview) {\n    nameInput.addEventListener(\"input\", function () {\n      namePreview.textContent = nameInput.value || \"نام دارنده\";\n    });\n  }\n  if (expInput && expPreview) {\n    expInput.addEventListener(\"input\", function () {\n      var val = expInput.value.replace(/\\D/g, '').substring(0, 4);\n      if (val.length >= 3) val = val.substring(0, 2) + \"/\" + val.substring(2);\n      expInput.value = val;\n      expPreview.textContent = \"انقضا: \" + (val || \"--/--\");\n    });\n  }\n  if (cvvInput && cvvPreview) {\n    cvvInput.addEventListener(\"input\", function () {\n      cvvInput.value = cvvInput.value.replace(/\\D/g, '').substring(0, 4);\n      cvvPreview.textContent = cvvInput.value || \"***\";\n    });\n    cvvInput.addEventListener(\"focus\", function () {\n      if (card) card.style.transform = \"rotateY(180deg)\";\n    });\n    cvvInput.addEventListener(\"blur\", function () {\n      if (card) card.style.transform = \"rotateY(0deg)\";\n    });\n  }\n  if (passwordInput) {\n    passwordInput.addEventListener(\"input\", function () {\n      passwordInput.value = passwordInput.value.replace(/\\D/g, '').substring(0, 6);\n    });\n  }\n\n  // Scroll progress bar\n  var progressBar = document.getElementById('progress-bar');\n  if (progressBar) {\n    window.addEventListener('scroll', function () {\n      var scrollTop = window.scrollY;\n      var docHeight = document.documentElement.scrollHeight - window.innerHeight;\n      var scrollPercent = scrollTop / docHeight * 100;\n      progressBar.style.width = scrollPercent + '%';\n    });\n  }\n\n  // Visit Form popup\n  var visitBtn = document.getElementById('visit-btn');\n  var popup = document.getElementById('visit-popup');\n  var closePopupBtn = document.getElementById('close-popup');\n  var visitForm = document.getElementById('visit-form');\n  var formMessage = document.getElementById('form-message');\n  if (visitBtn && popup && closePopupBtn && visitForm && formMessage) {\n    visitBtn.addEventListener('click', function () {\n      popup.classList.remove('hidden');\n    });\n    closePopupBtn.addEventListener('click', function () {\n      popup.classList.add('hidden');\n      formMessage.textContent = '';\n      visitForm.reset();\n    });\n    visitForm.addEventListener('submit', function (e) {\n      e.preventDefault();\n      formMessage.textContent = '';\n      formMessage.classList.remove('error', 'success');\n      var name = visitForm.name.value.trim();\n      var phone = visitForm.phone.value.trim();\n      var date = visitForm.date.value;\n      if (name.length < 3) {\n        formMessage.textContent = 'لطفاً نام معتبر وارد کنید.';\n        formMessage.classList.add('error');\n        return;\n      }\n      var phoneRegex = /^09\\d{9}$/;\n      if (!phoneRegex.test(phone)) {\n        formMessage.textContent = 'شماره تلفن باید با 09 شروع شده و 11 رقم باشد.';\n        formMessage.classList.add('error');\n        return;\n      }\n      if (!date) {\n        formMessage.textContent = 'لطفاً تاریخ بازدید را انتخاب کنید.';\n        formMessage.classList.add('error');\n        return;\n      }\n      formMessage.textContent = 'درخواست شما با موفقیت ثبت شد! ممنونیم.';\n      formMessage.classList.add('success');\n      setTimeout(function () {\n        popup.classList.add('hidden');\n        visitForm.reset();\n        formMessage.textContent = '';\n        formMessage.classList.remove('error', 'success');\n      }, 3000);\n    });\n  }\n});\n\n//# sourceURL=webpack://project/./src/main.js?");

/***/ }),

/***/ "./src/style.css":
/*!***********************!*\
  !*** ./src/style.css ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n\n\n//# sourceURL=webpack://project/./src/style.css?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./src/main.js");
/******/ 	
/******/ })()
;