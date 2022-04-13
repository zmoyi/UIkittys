"use strict";
/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
(self["webpackChunkjs"] = self["webpackChunkjs"] || []).push([["src_InfiniteAjaxScrolls_js"],{

/***/ "./src/InfiniteAjaxScrolls.js":
/*!************************************!*\
  !*** ./src/InfiniteAjaxScrolls.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _webcreate_infinite_ajax_scroll__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @webcreate/infinite-ajax-scroll */ \"./node_modules/@webcreate/infinite-ajax-scroll/dist/infinite-ajax-scroll.es.js\");\n\r\n\r\nlet el = document.querySelector('#container');\r\nif (el) {\r\n    window.ias = new _webcreate_infinite_ajax_scroll__WEBPACK_IMPORTED_MODULE_0__[\"default\"]('#container', {\r\n        item: '#post',\r\n        next: '.next',\r\n        pagination: '.pager',\r\n        prefill:true,\r\n        spinner: {\r\n            // element to show as spinner\r\n            element: '.loaders',\r\n            delay: 3000,\r\n\r\n            // this function is called when the button has to be shown\r\n            show: function(element) {\r\n                element.style.display = 'inline'; // default behaviour\r\n            },\r\n\r\n            // this function is called when the button has to be hidden\r\n            hide: function(element) {\r\n                element.style.display = 'none'; // default behaviour\r\n            }\r\n        }\r\n    });\r\n    ias.on('last', function() {\r\n        let el = document.querySelector('.no-more');\r\n        el.style.display = 'inline';\r\n    });\r\n\r\n\r\n}\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\n\n//# sourceURL=webpack://js/./src/InfiniteAjaxScrolls.js?");

/***/ })

}]);