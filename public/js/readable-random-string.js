/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/components/matrix/readable-random-string.js":
/*!******************************************************************!*\
  !*** ./resources/js/components/matrix/readable-random-string.js ***!
  \******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"rrs\": () => (/* binding */ rrs)\n/* harmony export */ });\nvar VOWELS = ['a', 'an', 'ai', 'au', 'e', 'ei', 'eu', 'en', 'i', 'in', 'io', 'o', 'oi', 'ou', 'on', 'u', 'un', 'ui', 'y'];\nvar CONSONANTS = ['b', 'br', 'bl', 'c', 'cr', 'ch', 'd', 'dr', 'f', 'ff', 'fr', 'fl', 'g', 'gu', 'gr', 'gl', 'gn', 'j', 'k', 'kr', 'l', 'll', 'lt', 'lg', 'lj', 'lk', 'lm', 'lv', 'lgu', 'lgr', 'm', 'mm', 'n', 'nn', 'p', 'pr', 'ps', 'pl', 'pn', 'pp', 'q', 'qu', 'r', 'rt', 'rp', 'rg', 'rd', 'rq', 'rj', 'rgu', 'rgr', 'rgl', 'rgn', 's', 'ss', 'sl', 't', 'tr', 'tl', 'th', 'tt', 'v', 'vr', 'w', 'x', 'y', 'z', 'zt', 'zj', 'zv'];\nvar BLACKLIST = ['aiw', 'eiw', 'gni', 'guo', 'gua', 'iow', 'mz', 'mr', 'mt', 'mq', 'ms', 'md', 'mf', 'mg', 'mh', 'mj', 'mk', 'ml', 'mw', 'mx', 'mc', 'mv', 'mn', 'nm', 'nw', 'nb', 'np', 'oiw', 'ouw', 'onw', 'uu', 'uw', 'uiw', 'yy'];\n\n// TODO: not start with same 2 consonants\n\nvar SYLLABES = [VOWELS, CONSONANTS];\nvar randomBetweenZeroAnd = function randomBetweenZeroAnd(max) {\n  return Math.floor(Math.random() * (max + 1));\n};\nvar uuid = function uuid() {\n  var length = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 4;\n  var str = '';\n  var startWith = randomBetweenZeroAnd(1);\n  while (str.length < length) {\n    var remainingLength = length - str.length;\n    var pos = randomBetweenZeroAnd(SYLLABES[startWith].length - 1);\n    var syllabe = SYLLABES[startWith][pos];\n    while (syllabe.length > remainingLength) {\n      var _pos = randomBetweenZeroAnd(SYLLABES[startWith].length - 1);\n      syllabe = SYLLABES[startWith][_pos];\n    }\n    str += syllabe;\n    startWith = (startWith + 1) % 2;\n  }\n  if (new RegExp(BLACKLIST.join(\"|\")).test(str)) {\n    return uuid(length);\n  }\n  return str;\n};\nvar rrs = function rrs(length) {\n  var separatorGap = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;\n  if (!separatorGap) {\n    return uuid(length);\n  }\n  var str = '';\n  while (str.length < length) {\n    str += uuid(separatorGap) + '-';\n  }\n  return str.slice(0, length);\n};\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvY29tcG9uZW50cy9tYXRyaXgvcmVhZGFibGUtcmFuZG9tLXN0cmluZy5qcy5qcyIsIm1hcHBpbmdzIjoiOzs7O0FBQUEsSUFBTUEsTUFBTSxHQUFHLENBQ1gsR0FBRyxFQUFFLElBQUksRUFBRSxJQUFJLEVBQUUsSUFBSSxFQUNyQixHQUFHLEVBQUUsSUFBSSxFQUFFLElBQUksRUFBRSxJQUFJLEVBQ3JCLEdBQUcsRUFBRSxJQUFJLEVBQUUsSUFBSSxFQUNmLEdBQUcsRUFBRSxJQUFJLEVBQUUsSUFBSSxFQUFFLElBQUksRUFDckIsR0FBRyxFQUFFLElBQUksRUFBRSxJQUFJLEVBQ2YsR0FBRyxDQUNOO0FBRUQsSUFBTUMsVUFBVSxHQUFHLENBQ2YsR0FBRyxFQUFFLElBQUksRUFBRSxJQUFJLEVBQ2YsR0FBRyxFQUFFLElBQUksRUFBRSxJQUFJLEVBQ2YsR0FBRyxFQUFFLElBQUksRUFDVCxHQUFHLEVBQUUsSUFBSSxFQUFFLElBQUksRUFBRSxJQUFJLEVBQ3JCLEdBQUcsRUFBRSxJQUFJLEVBQUUsSUFBSSxFQUFFLElBQUksRUFBRSxJQUFJLEVBQzNCLEdBQUcsRUFDSCxHQUFHLEVBQUUsSUFBSSxFQUNULEdBQUcsRUFBRSxJQUFJLEVBQUUsSUFBSSxFQUFFLElBQUksRUFBRSxJQUFJLEVBQUUsSUFBSSxFQUFFLElBQUksRUFBRSxJQUFJLEVBQUUsS0FBSyxFQUFFLEtBQUssRUFDM0QsR0FBRyxFQUFFLElBQUksRUFDVCxHQUFHLEVBQUUsSUFBSSxFQUNULEdBQUcsRUFBRSxJQUFJLEVBQUUsSUFBSSxFQUFFLElBQUksRUFBRSxJQUFJLEVBQUUsSUFBSSxFQUNqQyxHQUFHLEVBQUUsSUFBSSxFQUNULEdBQUcsRUFBRSxJQUFJLEVBQUUsSUFBSSxFQUFFLElBQUksRUFBRSxJQUFJLEVBQUUsSUFBSSxFQUFFLElBQUksRUFBRSxLQUFLLEVBQUUsS0FBSyxFQUFFLEtBQUssRUFBRSxLQUFLLEVBQ25FLEdBQUcsRUFBRSxJQUFJLEVBQUUs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LEdBQUcsQ0FBQ1UsS0FBSyxDQUFDLENBQUMsRUFBRVgsTUFBTSxDQUFDO0FBQy9CLENBQUMiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvY29tcG9uZW50cy9tYXRyaXgvcmVhZGFibGUtcmFuZG9tLXN0cmluZy5qcz9jYmM2Il0sInNvdXJjZXNDb250ZW50IjpbImNvbnN0IFZPV0VMUyA9IFtcbiAgICAnYScsICdhbicsICdhaScsICdhdScsXG4gICAgJ2UnLCAnZWknLCAnZXUnLCAnZW4nLFxuICAgICdpJywgJ2luJywgJ2lvJyxcbiAgICAnbycsICdvaScsICdvdScsICdvbicsXG4gICAgJ3UnLCAndW4nLCAndWknLFxuICAgICd5J1xuXTtcblxuY29uc3QgQ09OU09OQU5UUyA9IFtcbiAgICAnYicsICdicicsICdibCcsXG4gICAgJ2MnLCAnY3InLCAnY2gnLFxuICAgICdkJywgJ2RyJyxcbiAgICAnZicsICdmZicsICdmcicsICdmbCcsXG4gICAgJ2cnLCAnZ3UnLCAnZ3InLCAnZ2wnLCAnZ24nLFxuICAgICdqJyxcbiAgICAnaycsICdrcicsXG4gICAgJ2wnLCAnbGwnLCAnbHQnLCAnbGcnLCAnbGonLCAnbGsnLCAnbG0nLCAnbHYnLCAnbGd1JywgJ2xncicsXG4gICAgJ20nLCAnbW0nLFxuICAgICduJywgJ25uJyxcbiAgICAncCcsICdwcicsICdwcycsICdwbCcsICdwbicsICdwcCcsXG4gICAgJ3EnLCAncXUnLFxuICAgICdyJywgJ3J0JywgJ3JwJywgJ3JnJywgJ3JkJywgJ3JxJywgJ3JqJywgJ3JndScsICdyZ3InLCAncmdsJywgJ3JnbicsXG4gICAgJ3MnLCAnc3MnLCAnc2wnLFxuICAgICd0JywgJ3RyJywgJ3RsJywgJ3RoJywgJ3R0JyxcbiAgICAndicsICd2cicsXG4gICAgJ3cnLFxuICAgICd4JyxcbiAgICAneScsXG4gICAgJ3onLCAnenQnLCAnemonLCAnenYnXG5dO1xuXG5jb25zdCBCTEFDS0xJU1QgPSBbXG4gICAgJ2FpdycsXG4gICAgJ2VpdycsXG4gICAgJ2duaScsICdndW8nLCAnZ3VhJyxcbiAgICAnaW93JyxcbiAgICAnbXonLCAnbXInLCAnbXQnLCAnbXEnLCAnbXMnLCAnbWQnLCAnbWYnLCAnbWcnLCAnbWgnLCAnbWonLCAnbWsnLCAnbWwnLCAnbXcnLCAnbXgnLCAnbWMnLCAnbXYnLCAnbW4nLFxuICAgICdubScsICdudycsXG4gICAgJ25iJywgJ25wJyxcbiAgICAnb2l3JywgJ291dycsICdvbncnLFxuICAgICd1dScsICd1dycsICd1aXcnLFxuICAgICd5eSdcbl07XG5cbi8vIFRPRE86IG5vdCBzdGFydCB3aXRoIHNhbWUgMiBjb25zb25hbnRzXG5cbmNvbnN0IFNZTExBQkVTID0gW1ZPV0VMUywgQ09OU09OQU5UU107XG5cbmNvbnN0IHJhbmRvbUJldHdlZW5aZXJvQW5kID0gKG1heCkgPT4ge1xuICAgIHJldHVybiBNYXRoLmZsb29yKE1hdGgucmFuZG9tKCkgKiAobWF4ICsgMSkpO1xufTtcblxuY29uc3QgdXVpZCA9IChsZW5ndGggPSA0KSA9PiB7XG4gICAgbGV0IHN0ciA9ICcnO1xuICAgIGxldCBzdGFydFdpdGggPSByYW5kb21CZXR3ZWVuWmVyb0FuZCgxKTtcblxuICAgIHdoaWxlIChzdHIubGVuZ3RoIDwgbGVuZ3RoKSB7XG4gICAgICAgIGNvbnN0IHJlbWFpbmluZ0xlbmd0aCA9IGxlbmd0aCAtIHN0ci5sZW5ndGg7XG5cbiAgICAgICAgbGV0IHBvcyA9IHJhbmRvbUJldHdlZW5aZXJvQW5kKFNZTExBQkVTW3N0YXJ0V2l0aF0ubGVuZ3RoIC0gMSk7XG4gICAgICAgIGxldCBzeWxsYWJlID0gU1lMTEFCRVNbc3RhcnRXaXRoXVtwb3NdO1xuXG4gICAgICAgIHdoaWxlIChzeWxsYWJlLmxlbmd0aCA+IHJlbWFpbmluZ0xlbmd0aCkge1xuICAgICAgICAgICAgbGV0IHBvcyA9IHJhbmRvbUJldHdlZW5aZXJvQW5kKFNZTExBQkVTW3N0YXJ0V2l0aF0ubGVuZ3RoIC0gMSk7XG4gICAgICAgICAgICBzeWxsYWJlID0gU1lMTEFCRVNbc3RhcnRXaXRoXVtwb3NdO1xuICAgICAgICB9XG5cbiAgICAgICAgc3RyICs9IHN5bGxhYmU7XG5cbiAgICAgICAgc3RhcnRXaXRoID0gKHN0YXJ0V2l0aCArIDEpICUgMjtcbiAgICB9XG5cbiAgICBpZiAobmV3IFJlZ0V4cChCTEFDS0xJU1Quam9pbihcInxcIikpLnRlc3Qoc3RyKSkge1xuICAgICAgICByZXR1cm4gdXVpZChsZW5ndGgpO1xuICAgIH1cblxuICAgIHJldHVybiBzdHI7XG59O1xuXG5jb25zdCBycnMgPSAobGVuZ3RoLCBzZXBhcmF0b3JHYXAgPSAwKSA9PiB7XG4gICAgaWYgKCFzZXBhcmF0b3JHYXApIHtcbiAgICAgICAgcmV0dXJuIHV1aWQobGVuZ3RoKTtcbiAgICB9XG5cbiAgICBsZXQgc3RyID0gJyc7XG5cbiAgICB3aGlsZSAoc3RyLmxlbmd0aCA8IGxlbmd0aCkge1xuICAgICAgICBzdHIgKz0gdXVpZChzZXBhcmF0b3JHYXApICsgJy0nO1xuICAgIH1cblxuICAgIHJldHVybiBzdHIuc2xpY2UoMCwgbGVuZ3RoKTtcbn07XG5cbmV4cG9ydCB7IHJycyB9OyJdLCJuYW1lcyI6WyJWT1dFTFMiLCJDT05TT05BTlRTIiwiQkxBQ0tMSVNUIiwiU1lMTEFCRVMiLCJyYW5kb21CZXR3ZWVuWmVyb0FuZCIsIm1heCIsIk1hdGgiLCJmbG9vciIsInJhbmRvbSIsInV1aWQiLCJsZW5ndGgiLCJzdHIiLCJzdGFydFdpdGgiLCJyZW1haW5pbmdMZW5ndGgiLCJwb3MiLCJzeWxsYWJlIiwiUmVnRXhwIiwiam9pbiIsInRlc3QiLCJycnMiLCJzZXBhcmF0b3JHYXAiLCJzbGljZSJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/components/matrix/readable-random-string.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
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
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/components/matrix/readable-random-string.js"](0, __webpack_exports__, __webpack_require__);
/******/ 	
/******/ })()
;