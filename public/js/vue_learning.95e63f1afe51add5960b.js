/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/vue_learning.js":
/***/ (function(module, exports) {


// Creating a Vue Component for tabs.
// Essentially handles all parent/group behavior of tabbing.
Vue.component('tabs', {

  template: '\n    <div>\n      <div class="tabs">\n        <ul>\n          <li v-for="tab in tabs" :class="{ \'active\': tab.isActive }">\n            <a :href="tab.href" @click=selectTab(tab)>{{ tab.name }}</a>\n          </li>\n        </ul>\n      </div>\n\n      <div class="tab-details">\n        <slot></slot>\n      </div>\n    </div>\n  ',

  data: function data() {
    return { tabs: [] };
  },


  methods: {
    selectTab: function selectTab(selectedTab) {
      this.tabs.forEach(function (tab) {
        tab.isActive = tab.name == selectedTab.name;
      });
    }
  },

  created: function created() {
    this.tabs = this.$children;
  },
  mounted: function mounted() {
    console.log(this.$children);
  }
});

// Create a Vue Component for tab.
// Essentially handles all child/singlular behavior of tabbing.
Vue.component('tab', {

  template: '\n    <div v-show="isActive"><slot></slot></div>\n  ',

  data: function data() {
    return { isActive: false };
  },


  props: {
    name: { required: true },
    selected: { default: false }
  },

  mounted: function mounted() {
    this.isActive = this.selected;
  },


  computed: {
    href: function href() {
      return '#' + this.name.toLowerCase().replace(/ /g, '-');
    }
  }

});

// Create new Vue to do things, generically called "app".
// Name doesn't matter in this instance. More just an example of being able to name it what you want.
var app = new Vue({

  // Lives in #root element.
  el: '#root',

  data: {
    message: 'Hello World',
    newName: '',
    names: ['Joe', 'Mary', 'Jane', 'Jack'],
    title: 'Now the title is being set through VueJS.',
    tasks: [{ description: 'Go to the store', completed: true }, { description: 'Finish vue tutorials', completed: false }, { description: 'Take a nap', completed: false }, { description: 'Clear inbox', completed: true }],
    methodName: "methodName",
    propertyName: "propertyName",
    dataName: "dataName",
    eventName: "eventName"
  },

  methods: {
    // Old syntax for browser compatability:
    // addname: function () {
    addName: function addName() {
      this.names.push(this.newName);
      this.newName = '';
    }
  },

  computed: {
    incompleteTasks: function incompleteTasks() {
      return this.tasks.filter(function (task) {
        return !task.completed;
      });
    }
  }
});

/***/ }),

/***/ "./resources/assets/sass/base.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/sass/vue_learning.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__("./resources/assets/js/vue_learning.js");
__webpack_require__("./resources/assets/sass/base.scss");
module.exports = __webpack_require__("./resources/assets/sass/vue_learning.scss");


/***/ })

/******/ });