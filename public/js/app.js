(function (window) {
  if (window.Package) {
    Sulai = {};
  } else {
    window.Sulai = {};
  }
})(window);

if (typeof define === 'function' && define.amd) {
  define('Sulai', [], function () {
    return Sulai;
  });
} else if (typeof exports !== 'undefined' && !exports.nodeType) {
  if (typeof module !== 'undefined' && !module.nodeType && module.exports) {
    exports = module.exports = Sulai;
  }
  exports.default = Sulai;
}

Element.prototype.ready = function (fn) {
  if (document.readyState != 'loading') {
    fn();
  } else {
    document.addEventListener('DOMContentLoaded', fn);
  }
};

Element.prototype.off = function (eventName, eventHandler) {
  return this.removeEventListener(eventName, eventHandler);
};

Element.prototype.is = function (selector) {
  if (!selector) {
    return false;
  }

  if (
    this === selector ||
    this.tagName.toLowerCase() === selector ||
    (Sulai.isElement(selector) ? false : this.matches(selector))
  ) {
    return true;
  } else {
    return false;
  }
};

Element.prototype.siblings = function (selector) {
  let collection = this.parentNode.childrens(selector);

  return collection.filter(function (i) {
    return i !== this;
  });
};

Element.prototype.childrens = function (selector) { // ragu
  let elems = [];
  selector.split(', ').forEach((el) => {
    Array.prototype.filter.call(this.children, child => {
      if (child.is(el)) {
        elems.push(child);
      }
    });
  })
  return elems;
}

Array.prototype.childrens = function (selector) { // ragu
  let elems = [];
  selector.split(', ').forEach((el) => {
    this.forEach((child) => {
      child.querySelectorAll(`${el}`).forEach((eachChild) => {
        if (eachChild.is(el)) {
          elems.push(eachChild);
        }
      })
    })
  })
  return elems;
}

Element.prototype.index = function (selector) {
  if (!this) return -1;
  let el = this;
  let i = 0;
  do {
    if (el.is(selector)) {
      return i;
    }
    i++;
  } while (el = el.previousElementSibling);
  return i;
}

Array.prototype.index = function (selector) {
  if (!this) return -1;
  let i = 0;
  this.filter(el => {
    i = 0;
    do {
      if (el.is(selector)) {
        return i;
      }
      i++;
    } while (el = el.previousElementSibling);
  });
  return i;
}

Element.prototype.trigger = function (myEvent, options) {
  if (options) {
    if (window.CustomEvent && typeof window.CustomEvent === 'function') {
      var event = new CustomEvent(myEvent, {
        detail: options
      });
    } else {
      var event = document.createEvent('CustomEvent');
      event.initCustomEvent(myEvent, true, true, options);
    }
    return this.dispatchEvent(event);
  } else {
    var event = document.createEvent('HTMLEvents');
    event.initEvent('change', true, false);
    return this.dispatchEvent(event);
  }
}

Element.prototype.filter = function (filterFn) {
  return Array.prototype.filter.call(this, filterFn);
}

Element.prototype.innerHeight = function () {
  return parseFloat(window.getComputedStyle(this, null).getPropertyValue("height").replace("px", ""));
}

Element.prototype.innerWidth = function () {
  return parseFloat(window.getComputedStyle(this, null).getPropertyValue("width").replace("px", ""));
}

Element.prototype.fullHeight = function () {
  let elmHeight, elmMargin, elm = this;
  if (document.all) {
    elmHeight = parseInt(elm.currentStyle.height);
    elmMargin = parseInt(elm.currentStyle.marginTop, 10) + parseInt(elm.currentStyle.marginBottom, 10);
  } else {
    elmHeight = parseInt(document.defaultView.getComputedStyle(elm, '').getPropertyValue('height'));
    elmMargin = parseInt(document.defaultView.getComputedStyle(elm, '').getPropertyValue('margin-top')) + parseInt(document.defaultView.getComputedStyle(elm, '').getPropertyValue('margin-bottom'));
  }
  return (elmHeight + elmMargin);
}

Element.prototype.anime = function (options, duration, ease, callback) {
  options.target = this;
  return Sulai.animate.bind(options, duration, ease, callback)();
}

const TRANSITION = 'transition';
const FADE = 'fade';
const SHOW = 'show';
const COLLAPSE = 'collapse';
const COLLAPSING = 'collapsing';
const DISABLED = 'disabled';
const ACTIVE = 'active';
const ALERT = 'alert';
const MODAL_OPEN = 'modal-open';
const MODAL = 'modal';
const MODAL_BACKDROP = 'modal-backdrop';
const CAROUSEL = 'carousel';
const CAROUSEL_ITEM = 'carousel-item';
const CAROUSEL_ITEM_NEXT = 'carousel-item-next';
const CAROUSEL_ITEM_PREV = 'carousel-item-prev';
const CAROUSEL_ITEM_LEFT = 'carousel-item-left';
const CAROUSEL_ITEM_RIGHT = 'carousel-item-right';
const CAROUSEL_CONTROL_PREV = 'carousel-control-prev';
const CAROUSEL_CONTROL_NEXT = 'carousel-control-next';
const SPINNER_BORDER = 'spinner-border';
const D_FLEX = 'd-flex';
const D_NONE = 'd-none';
const SIDEBAR = 'sidebar';
const TEXT_DECOR_NONE = 'text-decor-none';
const SCROLL_TO_TOP = 'scroll-to-top';
const DROPDOWN_CONTENT = 'dropdown-content';
const SIDEBARTOGGLE = 'sidebarToggle';
const TOGGLED = 'toggled';
const COLLAPSED = 'collapsed';
const SIDEBAR_TOGGLED = 'sidebar-toggled';
const BROWSER_DEFAULT = 'browser-default';
const SULAI_TEXTAREA = 'sulai-textarea';
const VALID = 'valid';
const INVALID = 'invalid';
const VALIDATE = 'validate';
const SELECT_WRAPPER = 'select-wrapper';
const SELECT_DROPDOWN = 'select-dropdown';
const HELPER_TEXT = 'helper-text';
const INPUT_FIELD = 'input-field';
const PREFIX = 'prefix';
const HIDDENDIV = 'hiddendiv';
const TABBED = 'tabbed';
const CARET = 'caret';
const OPTGROUP = 'optgroup';
const KEYBOARD_FOCUSED = 'keyboard-focused';
const SELECTED = 'selected';
const FILE_FIELD = 'file-field';
const FILE_PATH = 'file-path';
const DROPDOWN_TRIGGER = 'dropdown-trigger';
const TABS = 'tabs';
const TAB = 'tab';
const INDICATOR = 'indicator';
const SEARCH_FIELD = 'search-field';
const SEARCH_HEADING = 'search-heading';
const POPUP_LIST = 'popup-list';
const SEARCH_HIDE = 'search-hide';

Sulai.version = '1.0.1';

Sulai.keys = {
  TAB: 9,
  ENTER: 13,
  ESC: 27,
  ARROW_UP: 38,
  ARROW_DOWN: 40
};

Sulai.tabPressed = false;
Sulai.keyDown = false;
let docHandleKeydown = function (e) {
  Sulai.keyDown = true;
  if (e.which === Sulai.keys.TAB || e.which === Sulai.keys.ARROW_DOWN || e.which === Sulai.keys.ARROW_UP) {
    Sulai.tabPressed = true;
  }
};
let docHandleKeyup = function (e) {
  Sulai.keyDown = false;
  if (e.which === Sulai.keys.TAB || e.which === Sulai.keys.ARROW_DOWN || e.which === Sulai.keys.ARROW_UP) {
    Sulai.tabPressed = false;
  }
};
let docHandleFocus = function (e) {
  if (Sulai.keyDown) {
    document.body.classList.add(`${KEYBOARD_FOCUSED}`);
  }
};
let docHandleBlur = function (e) {
  document.body.classList.remove(`${KEYBOARD_FOCUSED}`);
};
document.addEventListener('keydown', docHandleKeydown, true);
document.addEventListener('keyup', docHandleKeyup, true);
document.addEventListener('focus', docHandleFocus, true);
document.addEventListener('blur', docHandleBlur, true);

Sulai.AutoInit = function (context) {
  let root = !!context ? context : document.body;

  let registry = {
    Carousel: root.querySelectorAll(`.${CAROUSEL}:not(.no-autoinit)`),
    Dropdown: root.querySelectorAll(`.${DROPDOWN_TRIGGER}:not(.no-autoinit)`),
    FormSelect: root.querySelectorAll('select:not(.no-autoinit)'),
    Tabs: root.querySelectorAll(`.${TABS}:not(.no-autoinit)`),
  };

  for (let pluginName in registry) {
    let plugin = Sulai[pluginName];
    plugin.init(registry[pluginName]);
  }
};

Sulai.objectSelectorString = function (obj) {
  let tagStr = obj.tagName || '';
  let idStr = obj.id || '';
  let classStr = obj.class || '';
  return (tagStr + idStr + classStr).replace(/\s/g, '');
};

Sulai.guid = (function () {
  function s4() {
    return Math.floor((1 + Math.random()) * 0x10000)
      .toString(16)
      .substring(1);
  }
  return function () {
    return s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4();
  };
})();

Sulai.escapeHash = function (hash) {
  return hash.replace(/(:|\.|\[|\]|,|=|\/)/g, '\\$1');
};

Sulai.checkWithinContainer = function (container, bounding, offset) {
  let edges = {
    top: false,
    right: false,
    bottom: false,
    left: false
  };

  let containerRect = container.getBoundingClientRect();
  let containerBottom =
    container === document.body ?
      Math.max(containerRect.bottom, window.innerHeight) :
      containerRect.bottom;

  let scrollLeft = container.scrollLeft;
  let scrollTop = container.scrollTop;

  let scrolledX = bounding.left - scrollLeft;
  let scrolledY = bounding.top - scrollTop;

  if (scrolledX < containerRect.left + offset || scrolledX < offset) {
    edges.left = true;
  }

  if (
    scrolledX + bounding.width > containerRect.right - offset ||
    scrolledX + bounding.width > window.innerWidth - offset
  ) {
    edges.right = true;
  }

  if (scrolledY < containerRect.top + offset || scrolledY < offset) {
    edges.top = true;
  }

  if (
    scrolledY + bounding.height > containerBottom - offset ||
    scrolledY + bounding.height > window.innerHeight - offset
  ) {
    edges.bottom = true;
  }

  return edges;
};

Sulai.checkPossibleAlignments = function (el, container, bounding, offset) {
  let canAlign = {
    top: true,
    right: true,
    bottom: true,
    left: true,
    spaceOnTop: null,
    spaceOnRight: null,
    spaceOnBottom: null,
    spaceOnLeft: null
  };

  let containerAllowsOverflow = getComputedStyle(container).overflow === 'visible';
  let containerRect = container.getBoundingClientRect();
  let containerHeight = Math.min(containerRect.height, window.innerHeight);
  let containerWidth = Math.min(containerRect.width, window.innerWidth);
  let elOffsetRect = el.getBoundingClientRect();

  let scrollLeft = container.scrollLeft;
  let scrollTop = container.scrollTop;

  let scrolledX = bounding.left - scrollLeft;
  let scrolledYTopEdge = bounding.top - scrollTop;
  let scrolledYBottomEdge = bounding.top + elOffsetRect.height - scrollTop;

  canAlign.spaceOnRight = !containerAllowsOverflow ?
    containerWidth - (scrolledX + bounding.width) :
    window.innerWidth - (elOffsetRect.left + bounding.width);
  if (canAlign.spaceOnRight < 0) {
    canAlign.left = false;
  }

  canAlign.spaceOnLeft = !containerAllowsOverflow ?
    scrolledX - bounding.width + elOffsetRect.width :
    elOffsetRect.right - bounding.width;
  if (canAlign.spaceOnLeft < 0) {
    canAlign.right = false;
  }

  canAlign.spaceOnBottom = !containerAllowsOverflow ?
    containerHeight - (scrolledYTopEdge + bounding.height + offset) :
    window.innerHeight - (elOffsetRect.top + bounding.height + offset);
  if (canAlign.spaceOnBottom < 0) {
    canAlign.top = false;
  }

  canAlign.spaceOnTop = !containerAllowsOverflow ?
    scrolledYBottomEdge - (bounding.height - offset) :
    elOffsetRect.bottom - (bounding.height + offset);
  if (canAlign.spaceOnTop < 0) {
    canAlign.bottom = false;
  }

  return canAlign;
};

Sulai.getOverflowParent = function (element) {
  if (element == null) {
    return null;
  }

  if (element === document.body || getComputedStyle(element).overflow !== 'visible') {
    return element;
  }

  return Sulai.getOverflowParent(element.parentElement);
};

Sulai.getIdFromTrigger = function (trigger) {
  let id = trigger.getAttribute('data-target');
  if (!id) {
    id = trigger.getAttribute('href');
    if (id) {
      id = id.slice(1);
    } else {
      id = '';
    }
  }
  return id;
};

Sulai.getDocumentScrollTop = function () {
  return window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
};

Sulai.getDocumentScrollLeft = function () {
  return window.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft || 0;
};

let getTime =
  Date.now ||
  function () {
    return new Date().getTime();
  };

Sulai.throttle = function (func, wait, options) {
  let context, args, result;
  let timeout = null;
  let previous = 0;
  options || (options = {});
  let later = function () {
    previous = options.leading === false ? 0 : getTime();
    timeout = null;
    result = func.apply(context, args);
    context = args = null;
  };
  return function () {
    let now = getTime();
    if (!previous && options.leading === false) previous = now;
    let remaining = wait - (now - previous);
    context = this;
    args = arguments;
    if (remaining <= 0) {
      clearTimeout(timeout);
      timeout = null;
      previous = now;
      result = func.apply(context, args);
      context = args = null;
    } else if (!timeout && options.trailing !== false) {
      timeout = setTimeout(later, remaining);
    }
    return result;
  };
};

Sulai.getTransitionDurationFromElement = function (element) {
  if (!element) {
    return 0
  }
  let {
    transitionDuration,
    transitionDelay
  } = window.getComputedStyle(element)
  const floatTransitionDuration = parseFloat(transitionDuration)
  const floatTransitionDelay = parseFloat(transitionDelay)
  if (!floatTransitionDuration && !floatTransitionDelay) {
    return 0
  }
  transitionDuration = transitionDuration.split(',')[0]
  transitionDelay = transitionDelay.split(',')[0]
  return (parseFloat(transitionDuration) + parseFloat(transitionDelay)) * 1000
}

Sulai.deepExtend = function (out) {
  out = out || {};
  for (let i = 1; i < arguments.length; i++) {
    let obj = arguments[i];
    if (!obj)
      continue;
    for (let key in obj) {
      if (obj.hasOwnProperty(key)) {
        if (typeof obj[key] === 'object') {
          if (obj[key] instanceof Array == true)
            out[key] = obj[key].slice(0);
          else
            out[key] = Sulai.deepExtend(out[key], obj[key]);
        } else
          out[key] = obj[key];
      }
    }
  }
  return out;
};

Sulai.stringToElement = function (someString) {
  var temp = document.createElement('div');
  temp.innerHTML = someString;
  return temp.firstChild;
}

Sulai.isNode = function (selector) {
  return (
    typeof Node === "object" ? selector instanceof Node : selector && typeof selector === "object" && typeof selector.nodeType === "number" && typeof selector.nodeName === "string"
  );
}

Sulai.isElement = function (selector) {
  return (
    typeof HTMLElement === "object" ? selector instanceof HTMLElement : selector && typeof selector === "object" && selector !== null && selector.nodeType === 1 && typeof selector.nodeName === "string"
  );
}

Sulai.animate = function (duration, ease, callback) {
  // Untuk Animate Ini Masih Jauh Dari Sempurna Akan Saya Lanjutkan Apabila ProJect Ini Terus Di Lanjutkan
  if (this.currentStep == undefined) {
    this.currentStep = 0;
  }
  if (this.frameRate == undefined) {
    this.frameRate = 15 / 250;
  }
  this.currentStep++;
  Object.keys(this).forEach(eachStyle => {
    if (eachStyle != 'currentStep' && eachStyle != 'frameRate' && eachStyle != 'target') {
      let temp = [];
      Object.keys(this[eachStyle]).forEach((gaya, i) => {
        if (typeof this[eachStyle][gaya] === 'object') {
          let tempGaya = gaya;
          while (tempGaya.includes('??')) {
            tempGaya = tempGaya.replace("??", Sulai[ease](this.currentStep, this[eachStyle][gaya][0], this[eachStyle][gaya][1] - this[eachStyle][gaya][0], this.frameRate * duration));
          }
          temp.push(tempGaya);
        }
      })
      if (!temp.length) {
        temp.push(Sulai[ease](this.currentStep, this[eachStyle][0], this[eachStyle][1] - this[eachStyle][0], this.frameRate * duration));
      }
      this.target.style[eachStyle] = temp.join(' ');
    }
  });
  if (this.currentStep >= this.frameRate * duration) {
    if (typeof callback == "function") {
      return callback(this.target);
    } else {
      return;
    }
  };
  requestAnimationFrame(Sulai.animate.bind(this, duration, ease, callback));
}

Sulai.easeInQuad = function (x, t, b, c, d) {
  return c * (t /= d) * t + b;
}

Sulai.easeOutQuad = function (t, b, c, d) {
  return -c * (t /= d) * (t - 2) + b;
}

Sulai.easeInOutQuad = function (t, b, c, d) {
  if ((t /= d / 2) < 1) return c / 2 * t * t + b;
  return -c / 2 * ((--t) * (t - 2) - 1) + b;
}

Sulai.easeInCubic = function (t, b, c, d) {
  return c * (t /= d) * t * t + b;
}

Sulai.easeOutCubic = function (t, b, c, d) {
  return c * ((t = t / d - 1) * t * t + 1) + b;
}

Sulai.easeInOut = function (t, b, c, d) {
  if ((t /= d / 2) < 1) return c / 2 * t * t * t + b;
  return c / 2 * ((t -= 2) * t * t + 2) + b;
}

Sulai.easeInQuart = function (t, b, c, d) {
  return c * (t /= d) * t * t * t + b;
}

Sulai.easeOutQuart = function (t, b, c, d) {
  return -c * ((t = t / d - 1) * t * t * t - 1) + b;
}

Sulai.easeInOutQuart = function (t, b, c, d) {
  if ((t /= d / 2) < 1) return c / 2 * t * t * t * t + b;
  return -c / 2 * ((t -= 2) * t * t * t - 2) + b;
}

Sulai.easeInQuint = function (t, b, c, d) {
  return c * (t /= d) * t * t * t * t + b;
}

Sulai.easeOutQuint = function (t, b, c, d) {
  return c * ((t = t / d - 1) * t * t * t * t + 1) + b;
}

Sulai.easeInOutQuint = function (t, b, c, d) {
  if ((t /= d / 2) < 1) return c / 2 * t * t * t * t * t + b;
  return c / 2 * ((t -= 2) * t * t * t * t + 2) + b;
}

Sulai.easeInSine = function (t, b, c, d) {
  return -c * Math.cos(t / d * (Math.PI / 2)) + c + b;
}

Sulai.easeOutSine = function (t, b, c, d) {
  return c * Math.sin(t / d * (Math.PI / 2)) + b;
}

Sulai.easeInOutSine = function (t, b, c, d) {
  return -c / 2 * (Math.cos(Math.PI * t / d) - 1) + b;
}

Sulai.easeInExpo = function (t, b, c, d) {
  return (t == 0) ? b : c * Math.pow(2, 10 * (t / d - 1)) + b;
}

Sulai.easeOutExpo = function (t, b, c, d) {
  return (t == d) ? b + c : c * (-Math.pow(2, -10 * t / d) + 1) + b;
}

Sulai.easeInOutExpo = function (t, b, c, d) {
  if (t == 0) return b;
  if (t == d) return b + c;
  if ((t /= d / 2) < 1) return c / 2 * Math.pow(2, 10 * (t - 1)) + b;
  return c / 2 * (-Math.pow(2, -10 * --t) + 2) + b;
}

Sulai.easeInCirc = function (t, b, c, d) {
  return -c * (Math.sqrt(1 - (t /= d) * t) - 1) + b;
}

Sulai.easeOutCirc = function (t, b, c, d) {
  return c * Math.sqrt(1 - (t = t / d - 1) * t) + b;
}

Sulai.easeInOutCirc = function (t, b, c, d) {
  if ((t /= d / 2) < 1) return -c / 2 * (Math.sqrt(1 - t * t) - 1) + b;
  return c / 2 * (Math.sqrt(1 - (t -= 2) * t) + 1) + b;
}

Sulai.easeInElastic = function (t, b, c, d) {
  var s = 1.70158;
  var p = 0;
  var a = c;
  if (t == 0) return b;
  if ((t /= d) == 1) return b + c;
  if (!p) p = d * .3;
  if (a < Math.abs(c)) {
    a = c;
    var s = p / 4;
  } else var s = p / (2 * Math.PI) * Math.asin(c / a);
  return -(a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p)) + b;
}

Sulai.easeOutElastic = function (t, b, c, d) {
  var s = 1.70158;
  var p = 0;
  var a = c;
  if (t == 0) return b;
  if ((t /= d) == 1) return b + c;
  if (!p) p = d * .3;
  if (a < Math.abs(c)) {
    a = c;
    var s = p / 4;
  } else var s = p / (2 * Math.PI) * Math.asin(c / a);
  return a * Math.pow(2, -10 * t) * Math.sin((t * d - s) * (2 * Math.PI) / p) + c + b;
}

Sulai.easeInOutElastic = function (t, b, c, d) {
  var s = 1.70158;
  var p = 0;
  var a = c;
  if (t == 0) return b;
  if ((t /= d / 2) == 2) return b + c;
  if (!p) p = d * (.3 * 1.5);
  if (a < Math.abs(c)) {
    a = c;
    var s = p / 4;
  } else var s = p / (2 * Math.PI) * Math.asin(c / a);
  if (t < 1) return -.5 * (a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p)) + b;
  return a * Math.pow(2, -10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p) * .5 + c + b;
}

Sulai.easeInBack = function (t, b, c, d, s) {
  if (s == undefined) s = 1.70158;
  return c * (t /= d) * t * ((s + 1) * t - s) + b;
}

Sulai.easeOutBack = function (t, b, c, d, s) {
  if (s == undefined) s = 1.70158;
  return c * ((t = t / d - 1) * t * ((s + 1) * t + s) + 1) + b;
}

Sulai.easeInOutBack = function (t, b, c, d, s) {
  if (s == undefined) s = 1.70158;
  if ((t /= d / 2) < 1) return c / 2 * (t * t * (((s *= (1.525)) + 1) * t - s)) + b;
  return c / 2 * ((t -= 2) * t * (((s *= (1.525)) + 1) * t + s) + 2) + b;
}

Sulai.easeInBounce = function (x, t, b, c, d) {
  return c - easeOutBounce(d - t, 0, c, d) + b;
}

Sulai.easeOutBounce = function (t, b, c, d) {
  if ((t /= d) < (1 / 2.75)) {
    return c * (7.5625 * t * t) + b;
  } else if (t < (2 / 2.75)) {
    return c * (7.5625 * (t -= (1.5 / 2.75)) * t + .75) + b;
  } else if (t < (2.5 / 2.75)) {
    return c * (7.5625 * (t -= (2.25 / 2.75)) * t + .9375) + b;
  } else {
    return c * (7.5625 * (t -= (2.625 / 2.75)) * t + .984375) + b;
  }
}

Sulai.easeInOutBounce = function (t, b, c, d) {
  if (t < d / 2) return easeInBounce(t * 2, 0, c, d) * .5 + b;
  return easeOutBounce(t * 2 - d, 0, c, d) * .5 + c * .5 + b;
}

document.querySelector('#switchTheme').addEventListener('change', function (e) {
  if (this.checked) {

    document.documentElement.classList.add(`${TRANSITION}`);
    setTimeout(() => {
      document.documentElement.classList.remove(`${TRANSITION}`);
    }, Sulai.getTransitionDurationFromElement(document.documentElement))

    document.documentElement.setAttribute('data-theme', 'dark')
    localStorage.setItem('theme', 'dark')
  } else {

    document.documentElement.classList.add(`${TRANSITION}`);
    setTimeout(() => {
      document.documentElement.classList.remove(`${TRANSITION}`);
    }, Sulai.getTransitionDurationFromElement(document.documentElement))

    document.documentElement.setAttribute('data-theme', 'light')
    localStorage.setItem('theme', 'light')
  }
})

document.addEventListener('scroll', function () {
  if (document.documentElement.scrollTop > 100) {
    document.querySelector(`.${SCROLL_TO_TOP}`).style.display = 'flex';
    document.querySelector(`.${SCROLL_TO_TOP}`).anime({
      opacity: [0, 1]
    }, 500, 'easeInOutExpo');
  } else {
    document.querySelector(`.${SCROLL_TO_TOP}`).anime({
      opacity: [1, 0]
    }, 500, 'easeInOutExpo', (anim) => {
      document.querySelector(`.${SCROLL_TO_TOP}`).style.display = 'none';
    });
  }
}, false);

document.querySelector(`a.${SCROLL_TO_TOP}`).addEventListener('click', function (e) {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
}, false);

async function getCookie(name) {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) return parts.pop().split(';').shift();
}

async function noneBlock(params) {
  if (params.this.nextElementSibling) {
    params.this.nextElementSibling.classList.toggle(`${D_NONE}`);
  }
  if (params.this.previousElementSibling) {
    params.this.previousElementSibling.classList.toggle(`${D_NONE}`);
  }
  params.this.classList.toggle(`${D_NONE}`);
  params.this.parentNode.previousElementSibling.children[0].classList.toggle(`${D_NONE}`);
  params.this.parentNode.previousElementSibling.children[1].classList.toggle(`${D_NONE}`);
}

async function changeForm(params) {
  params.event.preventDefault();
  const formData = new FormData(params.this)
  document.querySelector('#changeForm').onsubmit = async function (event) {
    event.preventDefault();
    await formFetch({
      link: `${params.link}?${Array.from(formData.keys()).toString()}=${Array.from(formData.values()).toString()}`,
      method: params.method,
      this: this
    }).then((prom) => {
      if (prom.redirected || [201, 301, 302, 303, 307, 308].includes(prom.status)) {
        this.querySelector(`.${SPINNER_BORDER}`).classList.toggle(`${D_NONE}`);
        window.location.replace(prom.url)
      } else {
        return prom.json();
      }
    }).then((response) => {
      Object.keys(response).forEach((type) => {
        response[type].forEach((err) => {
          if (err.location != 'param') {
            if (err.param != 'yourpassword') {
              modalHide(document.querySelector('#confirmModal'));
              const inputForm = params.this.querySelector(`#${err.param}`)
              const helperText = inputForm.nextElementSibling
              inputForm.classList.add(`${INVALID}`)
              helperText.dataset.error = err.msg;
            } else {
              const passForm = this.querySelector(`#${err.param}`)
              const passHelperText = passForm.nextElementSibling.nextElementSibling
              passForm.classList.add(`${INVALID}`)
              passHelperText.dataset.error = err.msg;
            }
          }
        })
      })
    }).catch((response) => {
      console.log(response);
      window.location.replace(window.location.href)
    })
  }
}

async function verifyCode(param) {
  if (param.value.length == param.maxLength) {
    let next = param.nextElementSibling;
    if (next != null) next.focus();
  } else {
    let prev = param.previousElementSibling;
    if (prev != null) prev.focus();
  }
}

async function verifyForm(params) {
  params.event.preventDefault();
  params.this.querySelector(`.${SPINNER_BORDER}`).classList.toggle(`${D_NONE}`);
  let verify = '';
  params.this.querySelectorAll('#verify input').forEach(element => {
    verify = verify + element.value
  });
  const formData = new FormData(params.this)
  formData.set('verify', verify.toUpperCase())
  fetch(params.link, {
    credentials: 'same-origin',
    method: params.method,
    headers: {
      'CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: formData
  }).then((prom) => {
    if (prom.redirected) {
      params.this.querySelector(`.${SPINNER_BORDER}`).classList.toggle(`${D_NONE}`);
      params.this.querySelector(`.${INPUT_FIELD}`).innerHTML = `<strong>Your email has been verified</strong>`
      setTimeout(async function () {
        window.location.replace(prom.url)
      }, 5000)
    } else {
      return prom.json();
    }
  }).then((response) => {
    params.this.querySelector(`.${SPINNER_BORDER}`).classList.toggle(`${D_NONE}`);
    Object.keys(response).forEach((type) => {
      response[type].forEach((err) => {
        params.this.querySelectorAll(`#verify input`).forEach(element => {
          element.classList.add(`${INVALID}`)
        })
        params.this.querySelector(`.${HELPER_TEXT}`).dataset.error = err.msg;
      })
    })
  })
}

async function forgotForm(params) {
  params.event.preventDefault();
  await formFetch(params).then((prom) => {
    if (prom.status == 200) {
      params.this.querySelector(`.${SPINNER_BORDER}`).classList.toggle(`${D_NONE}`);
      params.this.querySelector(`.${INPUT_FIELD}`).innerHTML = `<strong>Request has been send</strong>`;
    } else {
      return prom.json();
    }
  }).then((response) => {
    setFormError(params, response)
  })
}

async function setFormError(params, response) {
  params.this.querySelector(`.${SPINNER_BORDER}`).classList.toggle(`${D_NONE}`);
  Object.keys(response).forEach((type) => {
    response[type].forEach((err) => {
      if (err.location != 'param' && err.location != 'query') {
        const inputForm = params.this.querySelector(`#${err.param}`)
        const helperText = inputForm.nextElementSibling.nextElementSibling
        inputForm.classList.add(`${INVALID}`)
        helperText.dataset.error = err.msg;
      }
    })
  })
}

async function sulaiForm(params) {
  params.event.preventDefault();
  await formFetch(params).then((prom) => {
    if (prom.redirected || [201, 301, 302, 303, 307, 308].includes(prom.status)) {
      params.this.querySelector(`.${SPINNER_BORDER}`).classList.toggle(`${D_NONE}`);
      window.location.replace(prom.url)
    } else {
      return prom.json();
    }
  }).then((response) => {
    setFormError(params, response)
  }).catch((response) => {
    window.location.replace(window.location.href)
  })
}

async function DEBUG(params) {
  params.event.preventDefault();
  await formFetch(params).then((prom) => {
    if (params.this.querySelector(`.${SPINNER_BORDER}`)) {
      params.this.querySelector(`.${SPINNER_BORDER}`).classList.toggle(`${D_NONE}`);
    }
    console.log(prom);
    return prom.text();
  }).then((response) => {
    console.log(response);
  }).catch((response) => {
    console.log(response);
  })
}

async function formFetch(params) {
  return await fetch(params.link, {
    method: params.method,
    headers: {
      'CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: new FormData(params.this)
  }).then((promise) => {
    return promise;
  })
}

document.querySelectorAll(`.${SIDEBARTOGGLE}`).forEach(each => {
  each.addEventListener('click', function (e) {
    document.body.classList.toggle(`${SIDEBAR_TOGGLED}`);
    document.querySelector(`.${SIDEBAR}`).classList.toggle(`${TOGGLED}`);
    if (document.querySelector(`.${SIDEBAR}`).classList.contains(`${TOGGLED}`)) {
      document.querySelector(`.${SIDEBAR}`).style.transition = 'all 200ms';
      document.querySelector(`.${SIDEBAR} .${COLLAPSE}`).style.transition = 'all 200ms';
    }
  }, false);
})

document.addEventListener('resize', function () {
  if (getWidth(document) < 768) {
    document.querySelector(`.${SIDEBAR}`).style.transition = 'all 200ms';
    document.querySelector(`.${SIDEBAR} .${COLLAPSE}`).style.transition = 'all 200ms';
  }
}, false)

document.querySelectorAll(`.${SPINNER_BORDER}`).forEach(spin => {
  spin.parentNode.addEventListener('click', function () {
    this.querySelector(`.${SPINNER_BORDER}`).classList.remove(`${D_NONE}`);
  })
}, false);

document.querySelector(`.${SEARCH_FIELD}`).addEventListener("focus", function () {
  document.querySelectorAll(`.${SEARCH_HIDE}`).forEach(hide => {
    if (window.innerWidth <= 768) {
      hide.classList.replace(`${D_FLEX}`, `${D_NONE}`)
    }
  });
}, false);

document.querySelector(`.${SEARCH_FIELD}`).addEventListener("focusout", function () {
  document.querySelectorAll(`.${SEARCH_HIDE}`).forEach(hide => {
    if (window.innerWidth <= 768) {
      setTimeout(() => {
        hide.classList.replace(`${D_NONE}`, `${D_FLEX}`)
      }, 200)
    }
  });
}, false);

document.getElementById('search-input').addEventListener('keyup', searchEngine, false);
document.getElementById('search-input').addEventListener('focus', searchEngine, false);

function searchEngine(e) {
  let input = document.getElementById('search-input');
  let html = '';
  let matchingResults = [];
  let heading = document.querySelector(`.${SEARCH_HEADING}`);

  if (input.value === '') {
    searchResults.forEach(function (obj) {
      heading.textContent = 'Most Visited';
      if (obj.frequent === true) {
        matchingResults.push(obj);
      }
    })
  } else {
    heading.textContent = 'Search Results';
    searchResults.forEach(function (obj) {
      if (obj.title.toUpperCase().includes(input.value.toUpperCase())) {
        matchingResults.push(obj);
      }
    })
  }

  if (matchingResults.length > 0) {
    matchingResults.forEach(function (el) {
      html += `
      <li><a class="${TEXT_DECOR_NONE}" href="${el.link}">${boldString(el.title, input.value)}</a></li>`
    })
    document.querySelector(`.${POPUP_LIST}`).innerHTML = html;
  } else {
    html = `<li>There are no suggestions for your query.</li>`
    document.querySelector(`.${POPUP_LIST}`).innerHTML = html;
  }
}

let searchResults = [{
  title: 'CodePen',
  description: 'This is just a test',
  link: '#test1',
  frequent: false
},
{
  title: 'Facebook',
  description: 'Something else to test',
  link: '#test2',
  frequent: false
},
{
  title: 'Font Awesome',
  description: 'Something else to test',
  link: '#test3',
  frequent: false
},
{
  title: 'Link 1',
  description: 'Something else to test, just a link name.',
  link: '#test4',
  frequent: false
},
{
  title: 'Stack Overflow',
  description: 'Something else to test, just another link name.',
  link: '#test5',
  frequent: false
},
{
  title: 'Google',
  description: 'Something else to test, just another link name.',
  link: '#googletest',
  frequent: true
},
{
  title: 'Apple',
  description: 'Something else to test, just another link name.',
  link: '#appletest',
  frequent: true
},
{
  title: 'Microsoft',
  description: 'Something else to test, just another link name.',
  link: '#Microsofttest',
  frequent: true
},
{
  title: 'Github',
  description: 'Something else to test, just another link name.',
  link: '#githubtest',
  frequent: true
}
]

function boldString(str, find) {
  let re = new RegExp(find, 'i');
  find = re.exec(str);
  return str.replace(re, '<b>' + find + '</b>');
}

function dropShow(each, event) {
  each.setAttribute('aria-expanded', 'true');
  each.nextElementSibling.classList.add(`${SHOW}`);
  event.stopPropagation();
}

function dropHide(each, event) {
  each.setAttribute('aria-expanded', 'false');
  each.nextElementSibling.classList.remove(`${SHOW}`);
  event.stopPropagation();
}

function collapseShow(each) {
  let target = document.querySelector(each.dataset.target);

  each.setAttribute('aria-expanded', 'true');
  each.classList.toggle(`${COLLAPSED}`);

  target.classList.replace(`${COLLAPSE}`, `${COLLAPSING}`);
  target.style.height = target.children[0].fullHeight() + 'px';

  setTimeout(() => {
    target.classList.replace(`${COLLAPSING}`, `${COLLAPSE}`);
    target.style.removeProperty('height');
    target.classList.toggle(`${SHOW}`);
  }, Sulai.getTransitionDurationFromElement(target))
}

function collapseHide(each) {
  let target = document.querySelector(each.dataset.target);

  each.setAttribute('aria-expanded', 'false');
  each.classList.toggle(`${COLLAPSED}`);

  target.classList.toggle(`${SHOW}`);
  target.classList.replace(`${COLLAPSE}`, `${COLLAPSING}`);
  target.style.height = '0px';

  setTimeout(() => {
    target.style.removeProperty('height');
    target.classList.replace(`${COLLAPSING}`, `${COLLAPSE}`);
  }, Sulai.getTransitionDurationFromElement(target))

}

function dismiss(each) {
  if (each.dataset.dismiss ?? false) {
    switch (each.dataset.dismiss) {
      case 'modal':
        each.addEventListener('click', function (e) {
          modalHide(this.closest(`.${MODAL}`));
        }, false)
        break;
      case 'alert':
        each.addEventListener('click', function (e) {
          this.closest(`.${ALERT}`).remove();
        }, false)
        break;

      default:
        console.log(each.dataset.dismiss);
        break;
    }
  }
}

function toggle(each) {
  if (each.dataset.toggle ?? false) {
    switch (each.dataset.toggle) {
      case 'collapse':
        each.setAttribute('aria-expanded', 'false');
        each.addEventListener('click', function (e) {
          if (this.getAttribute('aria-expanded') == 'true') {
            collapseHide(this)
          } else {
            let otherCollapse = document.querySelector(`[aria-expanded='true']`);
            if (otherCollapse != null) {
              collapseHide(otherCollapse);
              collapseShow(this);
            } else {
              collapseShow(this);
            }
          }
        }, false)
        break;
      case 'modal':
        each.addEventListener('click', function (e) {
          modalShow(each);
        }, false)
        break;

      default:
        console.log(each.dataset.toggle);
        break;
    }
  }
}

function modalShow(each, options) {
  let body = document.body;
  body.setAttribute('data-padding-right', '')
  body.style.paddingRight = window.getComputedStyle(document.documentElement, '::-webkit-scrollbar').getPropertyValue('width');
  body.classList.add(`${MODAL_OPEN}`);

  let modal = document.querySelector(each.dataset.target);
  modal.style.display = 'block';
  modal.style.paddingRight = window.getComputedStyle(document.documentElement, '::-webkit-scrollbar').getPropertyValue('width');

  setTimeout(() => {
    modal.classList.add(`${SHOW}`);
  }, Sulai.getTransitionDurationFromElement(modal))

  let backdrop = document.createElement('div');
  backdrop.classList.add(`${MODAL_BACKDROP}`, `${FADE}`, `${SHOW}`);
  document.body.appendChild(backdrop);

  document.addEventListener('mousedown', function (e) {
    if (e.target === modal) {
      modalHide(modal);
    }
  })
}

function modalHide(modal) {
  modal.classList.remove(`${SHOW}`);
  setTimeout(() => {
    modal.style.removeProperty('display');
  }, Sulai.getTransitionDurationFromElement(modal))

  if (document.querySelector(`.${MODAL_BACKDROP}:last-child`) != null) {
    document.querySelector(`.${MODAL_BACKDROP}:last-child`).remove();
  }

  let body = document.body;
  body.removeAttribute('data-padding-right');
  body.classList.remove(`${MODAL_OPEN}`);
  body.style.removeProperty('padding-right');
}

function setModalValue(params, resetForm) {
  Object.keys(params).forEach(id => {
    let target = document.querySelector(`#${id}`)
    switch (target.tagName) {
      case 'SELECT':
        target.querySelectorAll('option').forEach(function (option) {
          option.selected = false;
        })

        target.querySelectorAll('option').forEach(function (option) {
          if (params[id].split(',').find(options => options == option.value)) option.selected = true;
        })
        break;

      default:
        switch (target.type) {
          case 'checkbox':
            if (params[id] == 'true') target.checked = true;
            break;

          default:
            target.value = params[id];
            break;
        }
        break;
    }
  });
  if (resetForm) {
    Sulai.resetFormFields(resetForm, 'input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=number], input[type=search], input[type=date], input[type=time], textarea'.split(', '));
  }
}

class Component {
  constructor(classDef, el, options) {
    if (!(el instanceof Element)) {
      console.error(Error(el + ' is not an HTML Element'));
    }

    let ins = classDef.getInstance(el);
    if (!!ins) {
      ins.destroy();
    }

    this.el = el;
  }

  static init(classDef, els, options) {
    let instances = null;
    if (els instanceof Element) {
      instances = new classDef(els, options);
    } else if (!!els && (els instanceof NodeList)) {
      let instancesArr = [];
      for (let i = 0; i < els.length; i++) {
        let opsi = options ?? {};
        let dataAttributes = Object.assign({}, els[i].dataset);
        Object.keys(dataAttributes).forEach(element => {
          switch (dataAttributes[element]) {
            case 'true':
              opsi[element] = true;
              break;
            case 'false':
              opsi[element] = false;
              break;
            default:
              opsi[element] = dataAttributes[element];
              break;
          }
        });
        instancesArr.push(new classDef(els[i], opsi));
      }
      instances = instancesArr;
    }

    return instances;
  }
}

(function ($) {
  Sulai.updateTextFields = function () {
    let input_selector = 'input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=number], input[type=search], input[type=date], input[type=time], textarea'.split(', ');
    document.querySelectorAll(input_selector).forEach(function (element, index) {
      if (
        element.value.length > 0 ||
        element.is(':focus') ||
        element.autofocus ||
        element.placeholder.length > 0
      ) {
        if (element.siblings('label')[0]) element.siblings('label')[0].classList.add(`${ACTIVE}`);
      } else if (element.validity) {
        if (element.siblings('label')[0]) element.siblings('label')[0].classList.toggle(`${ACTIVE}`, element.validity.badInput === true);
      } else {
        if (element.siblings('label')[0]) element.siblings('label')[0].classList.remove(`${ACTIVE}`);
      }
    })
  };

  Sulai.validate_field = function (object) {
    let hasLength = object.dataset.length !== undefined;
    let lenAttr = parseInt(object.dataset.length);
    let len = object.value.length;

    if (len === 0 && object.validity.badInput === false && !object.is(':required')) {
      if (object.classList.contains(VALIDATE)) {
        object.classList.remove(`${VALID}`);
        object.classList.remove(`${INVALID}`);
      }
    } else {
      if (object.classList.contains(VALIDATE)) {
        if (
          (object.is(':valid') && hasLength && len <= lenAttr) ||
          (object.is(':valid') && !hasLength)
        ) {
          object.classList.remove(`${INVALID}`);
          object.classList.add(`${VALID}`);
        } else {
          object.classList.remove(`${VALID}`);
          object.classList.add(`${INVALID}`);
        }
      }
    }
  };

  Sulai.textareaAutoResize = function (textarea) {
    if (!textarea) {
      console.error('No textarea element found');
      return;
    }

    let hiddenDiv = document.querySelectorAll(`.${HIDDENDIV}`)[0];
    if (!hiddenDiv) {
      hiddenDiv = Sulai.stringToElement(`<div class="${HIDDENDIV}"></div>`);
      document.body.appendChild(hiddenDiv);
    }

    let fontFamily = textarea.style.fontFamily
    let fontSize = textarea.style.fontSize
    let lineHeight = textarea.style.lineHeight

    let paddingTop = textarea.style.paddingTop
    let paddingRight = textarea.style.paddingRight
    let paddingBottom = textarea.style.paddingBottom
    let paddingLeft = textarea.style.paddingLeft

    if (fontSize) hiddenDiv.style.fontSize = fontSize;
    if (fontFamily) hiddenDiv.style.fontFamily = fontFamily;
    if (lineHeight) hiddenDiv.style.lineHeight = lineHeight;
    if (paddingTop) hiddenDiv.style.paddingTop = paddingTop;
    if (paddingRight) hiddenDiv.style.paddingRight = paddingRight;
    if (paddingBottom) hiddenDiv.style.paddingBottom = paddingBottom;
    if (paddingLeft) hiddenDiv.style.paddingLeft = paddingLeft;

    if (!textarea.dataset.originalHeight) {
      textarea.dataset.originalHeight = parseFloat(getComputedStyle(textarea, null).height.replace("px", ""));
    }

    if (textarea.wrap === 'off') {
      hiddenDiv.style.overflowWrap = normal;
      hiddenDiv.style.whiteSpace = pre;
    }

    hiddenDiv.textContent = textarea.value + '\n';
    let content = hiddenDiv.innerHTML.replace(/\n/g, '<br>');
    hiddenDiv.innerHTML = content;

    if (textarea.offsetWidth > 0 && textarea.offsetHeight > 0) {
      hiddenDiv.style.width = parseFloat(getComputedStyle(textarea, null).width);
    } else {
      hiddenDiv.style.width = (window.innerWidth / 2) + 'px';
    }

    if (textarea.dataset.originalHeight <= hiddenDiv.innerHeight()) {
      textarea.style.height = hiddenDiv.innerHeight() + 'px';
    } else if (textarea.value.length < textarea.dataset.previousLength) {
      textarea.style.height = textarea.dataset.originalHeight + 'px';
    }
    textarea.dataset.previousLength = textarea.value.length;
  };

  Sulai.resetFormFields = function (formReset, input_selector) {
    if (formReset.tagName.toLowerCase() == 'form') {
      formReset.querySelector(input_selector).classList.remove(`${VALID}`);
      formReset.querySelector(input_selector).classList.remove(`${INVALID}`);
      formReset.querySelectorAll(input_selector).forEach(function (el) {
        if (el.value.length) {
          if (el.siblings('label')[0]) el.siblings('label')[0].classList.remove(`${ACTIVE}`);
        }
      });

      setTimeout(function () {
        formReset.querySelectorAll('select').forEach(function (el) {
          if (el.Sulai_FormSelect) {
            el.trigger('change');
          }
        });
      }, 0);
    }
  }

  document.documentElement.ready(function () {
    let input_selector = 'input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=number], input[type=search], input[type=date], input[type=time], textarea'.split(', ');

    document.addEventListener('change', function () {
      this.querySelectorAll(input_selector).forEach(el => {
        if (el.value.length !== 0 || el.placeholder.length > 0) {
          if (el.siblings('label')[0]) el.siblings('label')[0].classList.add(`${ACTIVE}`);
        }
        Sulai.validate_field(el);
      });
    })

    Sulai.updateTextFields();

    document.addEventListener('reset', function (e) {
      Sulai.resetFormFields(e.target, input_selector);
    });

    document.addEventListener('focus', function (e) {
      if (e.target.is(input_selector)) {
        e.target.siblings(`label, .${PREFIX}`).forEach(element => {
          element.classList.add(`${ACTIVE}`);
        });
      }
    }, true);

    document.addEventListener('blur', function (e) {
      let inputElement = e.target;
      if (inputElement.is(input_selector)) {
        let selector = `.${PREFIX}`;

        if (
          inputElement.value.length === 0 &&
          inputElement.validity.badInput !== true &&
          inputElement.placeholder.length === 0
        ) {
          selector += ', label';
        }
        inputElement.siblings(selector).forEach(element => {
          element.classList.remove(`${ACTIVE}`);
        });
        Sulai.validate_field(inputElement);
      }
    }, true);


    let radio_checkbox = 'input[type=radio], input[type=checkbox]';
    document.addEventListener('keyup', function (e) {
      this.querySelectorAll(radio_checkbox).forEach(el => {
        if (e.which === Sulai.keys.TAB) {
          el.classList.add(`${TABBED}`);
          el.addEventListener('blur', function (e) {
            el.classList.remove(`${TABBED}`);
          }, true);
          return;
        }
      });
    })

    let text_area_selector = `.${SULAI_TEXTAREA}`;
    document.querySelectorAll(text_area_selector).forEach(function (textarea) {
      textarea.dataset.originalHeight = parseFloat(getComputedStyle(textarea, null).height.replace("px", ""));
      textarea.dataset.previousLength = textarea.value.length;
      Sulai.textareaAutoResize(textarea);
    });

    document.addEventListener('keyup', function (e) {
      this.querySelectorAll(text_area_selector).forEach(el => {
        Sulai.textareaAutoResize(el);
      });
    });

    document.addEventListener('keydown', function () {
      this.querySelectorAll(text_area_selector).forEach(el => {
        Sulai.textareaAutoResize(el);
      });
    });

    document.addEventListener('change', function () {
      this.querySelectorAll(`.${FILE_FIELD} input[type="file"]`).forEach(el => {
        let file_field = el.closest(`.${FILE_FIELD}`);
        let path_input = file_field.querySelector(`input.${FILE_PATH}`);
        let files = el.files;
        let file_names = [];
        for (let i = 0; i < files.length; i++) {
          file_names.push(files[i].name);
        }
        path_input.value = file_names.join(', ');
        path_input.trigger('change');
      });
    });
  });
})(window);

(function ($) {
  'use strict';

  let _defaults = {
    interval: 5000,
    wrap: 'true',
    touch: 'true',
    duration: 100,
  };

  class Carousel extends Component {

    constructor(el, options) {
      super(Carousel, el, options);
      this.el = el;
      this.el.Sulai_Carousel = this;
      this.options = Sulai.deepExtend({}, Carousel.defaults, options);
      this.slide = this.el.querySelectorAll(`.${CAROUSEL_ITEM}`);
      this.nextSlide = '';
      this.prevSlide = '';

      this._setupEventHandlers();
      this._setupInterval();
    }

    static get defaults() {
      return _defaults;
    }

    static init(els, options) {
      return super.init(this, els, options);
    }

    static getInstance(el) {
      return el.Sulai_Carousel;
    }

    destroy() {
      this._removeEventHandlers();
      this._removeCarousel();
      this.el.Sulai_Carousel = undefined;
    }

    _setupInterval() {
      if (Number.isInteger(this.interval)) {
        setInterval(this.nextSlideBound, this.options.interval);
      }
    }

    _setupEventHandlers() {
      this.prevSlideBound = this.prevSlideHandler.bind(this);
      this.nextSlideBound = this.nextSlideHandler.bind(this);

      this.prev = this.el.parentNode.querySelectorAll(`.${CAROUSEL_CONTROL_PREV}`);
      this.next = this.el.parentNode.querySelectorAll(`.${CAROUSEL_CONTROL_NEXT}`);

      this.prev.forEach((el) => {
        el.addEventListener('click', this.prevSlideBound);
      })
      this.next.forEach((el) => {
        el.addEventListener('click', this.nextSlideBound);
      })
    }

    prevSlideHandler(e) {
      if (this.el.querySelector(`.${CAROUSEL_ITEM}.${CAROUSEL_ITEM_PREV}`) ?? false) {
        return;
      }

      let active = this.el.querySelector(`.${CAROUSEL_ITEM}.${ACTIVE}`);

      if (active.previousElementSibling) {
        this.prevSlide = active.previousElementSibling;
      } else {
        if (!!this.options.wrap) {
          this.prevSlide = this.slide[this.slide.length - 1];
        } else {
          return;
        }
      }

      this._animateSlide(active, 'prev')
    }

    nextSlideHandler(e) {
      if (this.el.querySelector(`.${CAROUSEL_ITEM}.${CAROUSEL_ITEM_NEXT}`) ?? false) {
        return;
      }

      let active = this.el.querySelector(`.${CAROUSEL_ITEM}.${ACTIVE}`);
      if (active.nextElementSibling) {
        this.nextSlide = active.nextElementSibling;
      } else {
        if (!!this.options.wrap) {
          this.nextSlide = this.slide[0];
        } else {
          return;
        }
      }

      this._animateSlide(active, 'next')
    }

    _animateSlide(active, direction) {
      let isNext = direction === 'next';
      let itemDirection = isNext ? CAROUSEL_ITEM_LEFT : CAROUSEL_ITEM_RIGHT;
      let itemSlide = isNext ? CAROUSEL_ITEM_NEXT : CAROUSEL_ITEM_PREV;

      active.classList.add(itemDirection);
      isNext ? this.nextSlide.classList.add(itemSlide) : this.prevSlide.classList.add(itemSlide);
      setTimeout(() => {
        isNext ? this.nextSlide.classList.add(itemDirection) : this.prevSlide.classList.add(itemDirection);
      }, this.options.duration)

      setTimeout(() => {
        active.classList.remove(`${ACTIVE}`, itemDirection);
        isNext ? this.nextSlide.classList.remove(itemSlide, itemDirection) : this.prevSlide.classList.remove(itemSlide, itemDirection);
        isNext ? this.nextSlide.classList.add(`${ACTIVE}`) : this.prevSlide.classList.add(`${ACTIVE}`);
      }, Sulai.getTransitionDurationFromElement(active))
    }

    _animateFade() {

    }
  }

  Sulai.Carousel = Carousel;
})(window);

(function ($) {
  'use strict';

  let _defaults = {
    classes: '',
    dropdownOptions: {}
  };

  class FormSelect extends Component {

    constructor(el, options) {
      super(FormSelect, el, options);

      if (this.el.classList.contains(`${BROWSER_DEFAULT}`)) {
        return;
      }

      this.el.Sulai_FormSelect = this;
      this.options = Sulai.deepExtend({}, FormSelect.defaults, options);
      this.isMultiple = this.el.multiple;
      this.el.tabIndex = -1;
      this._keysSelected = {};
      this._valueDict = {};
      this._setupDropdown();
      this._setupEventHandlers();
    }

    static get defaults() {
      return _defaults;
    }

    static init(els, options) {
      return super.init(this, els, options);
    }

    static getInstance(el) {
      return el.Sulai_FormSelect;
    }

    destroy() {
      this._removeEventHandlers();
      this._removeDropdown();
      this.el.Sulai_FormSelect = undefined;
    }

    _setupEventHandlers() {
      this._handleSelectChangeBound = this._handleSelectChange.bind(this);
      this._handleOptionClickBound = this._handleOptionClick.bind(this);
      this._handleInputClickBound = this._handleInputClick.bind(this);

      this.dropdownOptions.querySelectorAll(`li:not(.${OPTGROUP})`).forEach((el) => {
        el.addEventListener('click', this._handleOptionClickBound);
      });
      this.el.addEventListener('change', this._handleSelectChangeBound);
      this.input.addEventListener('click', this._handleInputClickBound);
    }

    _removeEventHandlers() {
      this.dropdownOptions.querySelectorAll(`li:not(.${OPTGROUP})`).forEach((el) => {
        el.removeEventListener('click', this._handleOptionClickBound);
      });
      this.el.removeEventListener('change', this._handleSelectChangeBound);
      this.input.removeEventListener('click', this._handleInputClickBound);
    }

    _handleSelectChange(e) {
      this._setValueToInput();
    }

    _handleOptionClick(e) {
      e.preventDefault();
      let option = e.target.closest('li');
      let key = option.id;
      if ((!option.classList.contains(`${DISABLED}`)) && (!option.classList.contains(`${OPTGROUP}`)) && key.length) {
        let selected = true;

        if (this.isMultiple) {
          let placeholderOption = this.dropdownOptions.querySelectorAll(`li.${DISABLED}.${SELECTED}`);
          if (placeholderOption.length) {
            placeholderOption.classList.remove(`${SELECTED}`);
            placeholderOption.querySelector('input[type="checkbox"]').checked = false;
            this._toggleEntryFromArray(placeholderOption[0].id);
          }
          selected = this._toggleEntryFromArray(key);
        } else {
          this.dropdownOptions.querySelector('li').classList.remove(`${SELECTED}`);
          option.classList.toggle(`${SELECTED}`, selected);
        }

        // let prevSelected = this._valueDict[key].el.selected;
        // this._valueDict[key].el.selected = prevSelected !== selected ? true : false;
        this._valueDict[key].el.selected = selected ? true : false;
        this.el.trigger('change');
      }

      e.stopPropagation();
    }

    _handleInputClick() {
      if (this.dropdown && this.dropdown.isOpen) {
        this._setValueToInput();
        this._setSelectedStates();
      }
    }

    _setupDropdown() {
      this.wrapper = document.createElement('div');
      this.wrapper.classList.add(`${SELECT_WRAPPER}`);
      if (this.options.classes) {
        this.wrapper.classList.add(this.options.classes);
      }
      this.el.insertAdjacentElement('beforebegin', this.wrapper);
      this.wrapper.appendChild(this.el);

      if (this.el.disabled) {
        this.wrapper.classList.add(`${DISABLED}`);
      }

      // Buat Dropdown Khusus Select.
      this.$selectOptions = this.el.childrens(`option, optgroup`);
      this.dropdownOptions = document.createElement('ul');
      this.dropdownOptions.id = `select-options-${Sulai.guid()}`;
      this.dropdownOptions.classList.add(`${DROPDOWN_CONTENT}`, `${SELECT_DROPDOWN}`);
      if (this.isMultiple) {
        this.dropdownOptions.classList.add('multiple-select-dropdown');
      }

      // Buat Struktur Dropdown
      if (this.$selectOptions.length) {
        for (const el of this.$selectOptions) {
          if (el.tagName.toLowerCase() === 'option') {
            let optionEl;
            if (this.isMultiple) {
              optionEl = this._appendOptionWithIcon(this.el, el, 'multiple');
            } else {
              optionEl = this._appendOptionWithIcon(this.el, el);
            }

            this._addOptionToValueDict(el, optionEl);
          } else if (el.tagName.toLowerCase() === 'optgroup') {
            let selectOptions = el.childrens('option');

            this.dropdownOptions.appendChild(Sulai.stringToElement(`<li class="${OPTGROUP}"><span>${el.getAttribute('label')}</span></li>`));

            for (const el of selectOptions) {
              let optionEl = this._appendOptionWithIcon(this.el, el, 'optgroup-option');
              this._addOptionToValueDict(el, optionEl);
            }
          }
        }
      }

      this.el.insertAdjacentElement('afterend', this.dropdownOptions);

      // Input dropdown
      this.input = document.createElement('input');
      this.input.classList.add(`${SELECT_DROPDOWN}`, `${DROPDOWN_TRIGGER}`);
      this.input.setAttribute('type', 'text');
      this.input.setAttribute('readonly', 'true');
      this.input.setAttribute('data-target', this.dropdownOptions.id);
      if (this.el.disabled) {
        this.input.disabled = true;
      }

      this.el.insertAdjacentElement('beforebegin', this.input);
      // this.el.insertAdjacentElement('beforebegin', this.dropdownOptions);

      this._setValueToInput();

      // Add caret
      let dropdownIcon = `<svg class="${CARET}" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>`;

      this.el.insertAdjacentElement('beforebegin', Sulai.stringToElement(dropdownIcon));

      // Siapkan Dropdown
      if (!this.el.disabled) {
        let dropdownOptions = Sulai.deepExtend({}, this.options.dropdownOptions);

        // Tambahkan callback untuk memusatkan opsi yang dipilih saat konten tarik-turun dapat digulir
        dropdownOptions.onOpenEnd = (el) => {
          let selectedOption = this.dropdownOptions.querySelectorAll(`.${SELECTED}`)[0];
          if (selectedOption) {
            if (selectedOption.length) {
              Sulai.keyDown = true;
              this.dropdown.focusedIndex = selectedOption.index();
              this.dropdown._focusFocusedItem();
              Sulai.keyDown = false;

              if (this.dropdown.isScrollable) {
                let scrollOffset = selectedOption[0].getBoundingClientRect().top - this.dropdownOptions.getBoundingClientRect().top;
                scrollOffset -= this.dropdownOptions.clientHeight / 2;
                this.dropdownOptions.scrollTop = scrollOffset;
              }
            }
          }
        };

        if (this.isMultiple) {
          dropdownOptions.closeOnClick = false;
        }
        this.dropdown = Sulai.Dropdown.init(this.input, dropdownOptions);
      }

      this._setSelectedStates();
    }

    _addOptionToValueDict(el, optionEl) {
      let index = Object.keys(this._valueDict).length;
      let key = this.dropdownOptions.id + index;
      let obj = {};
      optionEl.id = key;

      obj.el = el;
      obj.optionEl = optionEl;
      this._valueDict[key] = obj;
    }

    _removeDropdown() {
      let carret = this.wrapper.querySelector(`.${CARET}`);
      carret.parentNode.removeChild(this.wrapper);
      this.input.parentNode.removeChild(carret);

      this.dropdownOptions.parentNode.removeChild(this.dropdownOptions);
      this.wrapper.insertAdjacentElement('beforebegin', this.el);
      this.wrapper.parentNode.removeChild(this.wrapper);
    }

    _appendOptionWithIcon(select, option, type) {
      let disabledClass = option.disabled ? 'disabled ' : '';
      let optgroupClass = type === 'optgroup-option' ? 'optgroup-option' : '';
      let multipleCheckbox = this.isMultiple ? `<label><input type="checkbox" ${disabledClass}/><span>${option.innerHTML}</span></label>` : option.innerHTML;
      let liEl = document.createElement('li');
      let spanEl = document.createElement('span');
      spanEl.innerHTML = multipleCheckbox;
      if (disabledClass) {
        liEl.classList.add(disabledClass);
      }
      if (optgroupClass) {
        liEl.classList.add(optgroupClass);
      }
      liEl.appendChild(spanEl);

      // Kasih Icon
      let iconUrl = option.getAttribute('data-icon');
      if (!!iconUrl) {
        let imgEl = Sulai.stringToElement(`<img alt="" src="${iconUrl}">`);
        liEl.insertBefore(imgEl, liEl.firstChild);
      }

      // Check Kalau multiple tipe.
      this.dropdownOptions.appendChild(liEl);
      return liEl;
    }

    _toggleEntryFromArray(key) {
      let notAdded = !this._keysSelected.hasOwnProperty(key);
      let $optionLi = this._valueDict[key].optionEl

      if (notAdded) {
        this._keysSelected[key] = true;
      } else {
        delete this._keysSelected[key];
      }

      $optionLi.classList.toggle(`${SELECTED}`, notAdded);
      $optionLi.querySelector('input[type="checkbox"]').checked = notAdded ? true : false;
      $optionLi.selected = notAdded ? true : false;
      return notAdded;
    }

    _setValueToInput() {
      let values = [];
      let options = this.el.querySelectorAll('option');
      options.forEach(el => {
        if (el.selected) {
          values.push(el.textContent);
        }
      });

      if (!values.length) {
        let firstDisabled = this.el.querySelectorAll('option[disabled]');
        if (firstDisabled.length && firstDisabled[0].value === '') {
          values.push(firstDisabled.textContent);
        }
      }

      this.input.value = values.join(', ');
    }

    _setSelectedStates() {
      this._keysSelected = {};

      for (let key in this._valueDict) {
        let option = this._valueDict[key];
        let optionIsSelected = option.el.selected
        if (option.optionEl.querySelector('input[type="checkbox"]')) {
          option.optionEl.querySelector('input[type="checkbox"]').checked = optionIsSelected ? true : false;
        }
        if (optionIsSelected) {
          this._activateOption(this.dropdownOptions, option.optionEl);
          this._keysSelected[key] = true;
        } else {
          option.optionEl.classList.remove(`${SELECTED}`);
        }
      }
    }

    _activateOption(collection, newOption) {
      if (newOption) {
        if (!this.isMultiple) {
          if (collection.querySelector(`li.${SELECTED}`)) {
            collection.querySelector(`li.${SELECTED}`).classList.remove(`${SELECTED}`);
          }
        }
        let option = newOption;
        option.classList.add(`${SELECTED}`);
      }
    }

    getSelectedValues() {
      let selectedValues = [];
      for (let key in this._keysSelected) {
        selectedValues.push(this._valueDict[key].el.value);
      }
      return selectedValues;
    }
  }

  Sulai.FormSelect = FormSelect;
})(window);

(function ($) {
  'use strict';

  let _defaults = {
    alignment: 'left',
    autoFocus: true,
    constrainWidth: true,
    container: null,
    coverTrigger: true,
    closeOnClick: true,
    hover: false,
    inDuration: 150,
    outDuration: 250,
    onOpenStart: null,
    onOpenEnd: null,
    onCloseStart: null,
    onCloseEnd: null,
    onItemClick: null
  };

  class Dropdown extends Component {
    constructor(el, options) {
      super(Dropdown, el, options);
      this.el.Sulai_Dropdown = this;
      Dropdown._dropdowns.push(this);
      this.id = Sulai.getIdFromTrigger(el);
      this.dropdownEl = document.getElementById(this.id);
      this.$dropdownEl = this.dropdownEl
      this.options = Sulai.deepExtend({}, Dropdown.defaults, options);
      this.isOpen = false;
      this.isScrollable = false;
      this.isTouchMoving = false;
      this.focusedIndex = -1;
      this.filterQuery = [];

      if (!!!this.options.container) {
        this.options.container.appendChild(this.dropdownEl);
      } else {
        this.el.insertAdjacentElement('afterend', this.dropdownEl); // ragu
      }

      this._makeDropdownFocusable();
      this._resetFilterQueryBound = this._resetFilterQuery.bind(this);
      this._handleDocumentClickBound = this._handleDocumentClick.bind(this);
      this._handleDocumentTouchmoveBound = this._handleDocumentTouchmove.bind(this);
      this._handleDropdownClickBound = this._handleDropdownClick.bind(this);
      this._handleDropdownKeydownBound = this._handleDropdownKeydown.bind(this);
      this._handleTriggerKeydownBound = this._handleTriggerKeydown.bind(this);
      this._setupEventHandlers();
    }

    static get defaults() {
      return _defaults;
    }

    static init(els, options) {
      return super.init(this, els, options);
    }

    static getInstance(el) {
      return el.Sulai_Dropdown;
    }

    destroy() {
      this._resetDropdownStyles();
      this._removeEventHandlers();
      Dropdown._dropdowns.splice(Dropdown._dropdowns.indexOf(this), 1);
      this.el.Sulai_Dropdown = undefined;
    }

    _setupEventHandlers() {
      this.el.addEventListener('keydown', this._handleTriggerKeydownBound);
      this.dropdownEl.addEventListener('click', this._handleDropdownClickBound);

      if (this.options.hover) {
        this._handleMouseEnterBound = this._handleMouseEnter.bind(this);
        this.el.addEventListener('mouseenter', this._handleMouseEnterBound);
        this._handleMouseLeaveBound = this._handleMouseLeave.bind(this);
        this.el.addEventListener('mouseleave', this._handleMouseLeaveBound);
        this.dropdownEl.addEventListener('mouseleave', this._handleMouseLeaveBound);

      } else {
        this._handleClickBound = this._handleClick.bind(this);
        this.el.addEventListener('click', this._handleClickBound);
      }
    }

    _removeEventHandlers() {
      this.el.removeEventListener('keydown', this._handleTriggerKeydownBound);
      this.dropdownEl.removeEventListener('click', this._handleDropdownClickBound);

      if (this.options.hover) {
        this.el.removeEventListener('mouseenter', this._handleMouseEnterBound);
        this.el.removeEventListener('mouseleave', this._handleMouseLeaveBound);
        this.dropdownEl.removeEventListener('mouseleave', this._handleMouseLeaveBound);
      } else {
        this.el.removeEventListener('click', this._handleClickBound);
      }
    }

    _setupTemporaryEventHandlers() {
      document.body.addEventListener('click', this._handleDocumentClickBound, true);
      document.body.addEventListener('touchend', this._handleDocumentClickBound);
      document.body.addEventListener('touchmove', this._handleDocumentTouchmoveBound);
      this.dropdownEl.addEventListener('keydown', this._handleDropdownKeydownBound);
    }

    _removeTemporaryEventHandlers() {
      document.body.removeEventListener('click', this._handleDocumentClickBound, true);
      document.body.removeEventListener('touchend', this._handleDocumentClickBound);
      document.body.removeEventListener('touchmove', this._handleDocumentTouchmoveBound);
      this.dropdownEl.removeEventListener('keydown', this._handleDropdownKeydownBound);
    }

    _handleClick(e) {
      e.preventDefault();
      this.open();
    }

    _handleMouseEnter() {
      this.open();
    }

    _handleMouseLeave(e) {
      let toEl = e.toElement || e.relatedTarget;
      let leaveToDropdownContent = !!toEl.closest(`.${DROPDOWN_CONTENT}`).length;
      let leaveToActiveDropdownTrigger = false;

      let $closestTrigger = toEl.closest(`.${DROPDOWN_TRIGGER}`);
      if (
        $closestTrigger.length &&
        !!$closestTrigger[0].Sulai_Dropdown &&
        $closestTrigger[0].Sulai_Dropdown.isOpen
      ) {
        leaveToActiveDropdownTrigger = true;
      }

      if (!leaveToActiveDropdownTrigger && !leaveToDropdownContent) {
        this.close();
      }
    }

    _handleDocumentClick(e) {
      let $target = e.target
      if (
        this.options.closeOnClick && $target.closest(`.${DROPDOWN_CONTENT}`) && !this.isTouchMoving
      ) {
        setTimeout(() => {
          this.close();
        }, 0);
      } else if (
        $target.closest(`.${DROPDOWN_TRIGGER}`) || !$target.closest(`.${DROPDOWN_CONTENT}`)
      ) {
        setTimeout(() => {
          this.close();
        }, 0);
      }
      this.isTouchMoving = false;
    }

    _handleTriggerKeydown(e) {
      if ((e.which === Sulai.keys.ARROW_DOWN || e.which === Sulai.keys.ENTER) && !this.isOpen) {
        e.preventDefault();
        this.open();
      }
    }

    _handleDocumentTouchmove(e) {
      let $target = e.target
      if ($target.closest(`.${DROPDOWN_CONTENT}`)) {
        this.isTouchMoving = true;
      }
    }

    _handleDropdownClick(e) {
      if (typeof this.options.onItemClick === 'function') {
        let itemEl = e.target.closest('li')[0];
        this.options.onItemClick.call(this, itemEl);
      }
    }

    _handleDropdownKeydown(e) {
      if (e.which === Sulai.keys.TAB) {
        e.preventDefault();
        this.close();

      } else if ((e.which === Sulai.keys.ARROW_DOWN || e.which === Sulai.keys.ARROW_UP) && this.isOpen) {
        e.preventDefault();
        let direction = e.which === Sulai.keys.ARROW_DOWN ? 1 : -1;
        let newFocusedIndex = this.focusedIndex;
        let foundNewIndex = false;
        do {
          newFocusedIndex = newFocusedIndex + direction;

          if (
            !!this.dropdownEl.children[newFocusedIndex] &&
            this.dropdownEl.children[newFocusedIndex].tabIndex !== -1
          ) {
            foundNewIndex = true;
            break;
          }
        } while (newFocusedIndex < this.dropdownEl.children.length && newFocusedIndex >= 0);

        if (foundNewIndex) {
          this.focusedIndex = newFocusedIndex;
          this._focusFocusedItem();
        }

      } else if (e.which === Sulai.keys.ENTER && this.isOpen) {
        let focusedElement = this.dropdownEl.children[this.focusedIndex];
        let $activatableElement = focusedElement.querySelectorAll('a, button')[0];

        if (!!$activatableElement.length) {
          $activatableElement[0].click();
        } else if (!!focusedElement) {
          focusedElement.click();
        }

      } else if (e.which === Sulai.keys.ESC && this.isOpen) {
        e.preventDefault();
        this.close();
      }

      let letter = String.fromCharCode(e.which).toLowerCase(),
        nonLetters = [9, 13, 27, 38, 40];
      if (letter && nonLetters.indexOf(e.which) === -1) {
        this.filterQuery.push(letter);

        let string = this.filterQuery.join(''),
          // newOptionEl = Array.prototype.filter.call(this.dropdownEl.querySelectorAll('li'), (el) => {
          //   return (el.textContent.toLowerCase().indexOf(string) === 0);
          // })[0];

          newOptionEl = this.dropdownEl.querySelectorAll('li').filter((el) => {
            return (el.textContent.toLowerCase().indexOf(string) === 0);
          })[0];

        if (newOptionEl) {
          this.focusedIndex = newOptionEl.index();
          this._focusFocusedItem();
        }
      }

      this.filterTimeout = setTimeout(this._resetFilterQueryBound, 1000);
    }

    _resetFilterQuery() {
      this.filterQuery = [];
    }

    _resetDropdownStyles() {
      this.$dropdownEl.style.display = ''
      this.$dropdownEl.style.width = ''
      this.$dropdownEl.style.height = ''
      this.$dropdownEl.style.left = ''
      this.$dropdownEl.style.top = ''
      this.$dropdownEl.style.transformOrigin = ''
      this.$dropdownEl.style.transform = ''
      this.$dropdownEl.style.opacity = ''
    }

    _makeDropdownFocusable() {
      this.dropdownEl.tabIndex = 0;
      for (let el of this.dropdownEl.children) {
        if (!el.getAttribute('tabindex')) {
          el.setAttribute('tabindex', 0);
        }
      }
    }

    _focusFocusedItem() {
      if (
        this.focusedIndex >= 0 &&
        this.focusedIndex < this.dropdownEl.children.length &&
        this.options.autoFocus
      ) {
        this.dropdownEl.children[this.focusedIndex].focus();
      }
    }

    _getDropdownPosition() {
      let offsetParentBRect = this.el.offsetParent.getBoundingClientRect();
      let triggerBRect = this.el.getBoundingClientRect();
      let dropdownBRect = this.dropdownEl.getBoundingClientRect();

      let idealHeight = dropdownBRect.height;
      let idealWidth = dropdownBRect.width;
      let idealXPos = triggerBRect.left - dropdownBRect.left;
      let idealYPos = triggerBRect.top - dropdownBRect.top;

      let dropdownBounds = {
        left: idealXPos,
        top: idealYPos,
        height: idealHeight,
        width: idealWidth
      };

      let closestOverflowParent = !!this.dropdownEl.offsetParent ? this.dropdownEl.offsetParent : this.dropdownEl.parentNode;

      let alignments = Sulai.checkPossibleAlignments(
        this.el,
        closestOverflowParent,
        dropdownBounds,
        this.options.coverTrigger ? 0 : triggerBRect.height
      );

      let verticalAlignment = 'top';
      let horizontalAlignment = this.options.alignment;
      idealYPos += this.options.coverTrigger ? 0 : triggerBRect.height;

      this.isScrollable = false;

      if (!alignments.top) {
        if (alignments.bottom) {
          verticalAlignment = 'bottom';
        } else {
          this.isScrollable = true;

          if (alignments.spaceOnTop > alignments.spaceOnBottom) {
            verticalAlignment = 'bottom';
            idealHeight += alignments.spaceOnTop;
            idealYPos -= alignments.spaceOnTop;
          } else {
            idealHeight += alignments.spaceOnBottom;
          }
        }
      }

      if (!alignments[horizontalAlignment]) {
        let oppositeAlignment = horizontalAlignment === 'left' ? 'right' : 'left';
        if (alignments[oppositeAlignment]) {
          horizontalAlignment = oppositeAlignment;
        } else {
          if (alignments.spaceOnLeft > alignments.spaceOnRight) {
            horizontalAlignment = 'right';
            idealWidth += alignments.spaceOnLeft;
            idealXPos -= alignments.spaceOnLeft;
          } else {
            horizontalAlignment = 'left';
            idealWidth += alignments.spaceOnRight;
          }
        }
      }

      if (verticalAlignment === 'bottom') {
        idealYPos = idealYPos - dropdownBRect.height + (this.options.coverTrigger ? triggerBRect.height : 0);
      }
      if (horizontalAlignment === 'right') {
        idealXPos = idealXPos - dropdownBRect.width + triggerBRect.width;
      }
      return {
        x: idealXPos,
        y: idealYPos,
        verticalAlignment: verticalAlignment,
        horizontalAlignment: horizontalAlignment,
        height: idealHeight,
        width: idealWidth
      };
    }

    _animateIn() {
      this.dropdownEl.anime({
        transform: {
          'scale(??, ??)': [0.3, 1],
        },
        opacity: [0, 1],
      }, this.options.inDuration, 'easeOutQuint', (anim) => {
        if (this.options.autoFocus) {
          this.dropdownEl.focus();
        }
        if (typeof this.options.onOpenEnd === 'function') {
          this.options.onOpenEnd.call(this, this.el);
        }
      });
    }

    _animateOut() {
      this.dropdownEl.anime({
        transform: {
          'scale(??, ??)': [1, 0.3],
        },
        opacity: [1, 0],
      }, this.options.inDuration, 'easeOutQuint', (anim) => {
        this._resetDropdownStyles();
        if (typeof this.options.onCloseEnd === 'function') {
          this.options.onCloseEnd.call(this, this.el);
        }
      });
    }

    _placeDropdown() {
      let idealWidth = this.options.constrainWidth ? this.el.getBoundingClientRect().width : this.dropdownEl.getBoundingClientRect().width;
      this.dropdownEl.style.width = idealWidth + 'px';

      let positionInfo = this._getDropdownPosition();
      this.dropdownEl.style.left = positionInfo.x + 'px';
      this.dropdownEl.style.top = positionInfo.y + 'px';
      this.dropdownEl.style.height = positionInfo.height + 'px';
      this.dropdownEl.style.width = positionInfo.width + 'px';
      this.dropdownEl.style.transformOrigin = `${positionInfo.horizontalAlignment === 'left' ? '0' : '100%'} ${positionInfo.verticalAlignment === 'top' ? '0' : '100%'}`;
    }

    open() {
      if (this.isOpen) {
        return;
      }
      this.isOpen = true;

      if (typeof this.options.onOpenStart === 'function') {
        this.options.onOpenStart.call(this, this.el);
      }

      this._resetDropdownStyles();
      this.dropdownEl.style.display = 'block';

      this._placeDropdown();
      this._animateIn();
      this._setupTemporaryEventHandlers();
    }

    close() {
      if (!this.isOpen) {
        return;
      }
      this.isOpen = false;
      this.focusedIndex = -1;

      if (typeof this.options.onCloseStart === 'function') {
        this.options.onCloseStart.call(this, this.el);
      }

      this._animateOut();
      this._removeTemporaryEventHandlers();

      if (this.options.autoFocus) {
        this.el.focus();
      }
    }

    recalculateDimensions() {
      if (this.isOpen) {
        this.$dropdownEl.style.width = ''
        this.$dropdownEl.style.height = ''
        this.$dropdownEl.style.left = ''
        this.$dropdownEl.style.top = ''
        this.$dropdownEl.style.transformOrigin = ''
        this._placeDropdown();
      }
    }
  }

  Dropdown._dropdowns = [];
  Sulai.Dropdown = Dropdown;
})(window);

(function ($) {
  'use strict';

  let _defaults = {
    duration: 300,
    onShow: null,
    swipeable: false,
    responsiveThreshold: Infinity
  };

  class Tabs extends Component {

    constructor(el, options) {
      super(Tabs, el, options);
      this.el.Sulai_Tabs = this;
      this.options = Sulai.deepExtend({}, Tabs.defaults, options);

      this.tabLinks = this.el.childrens(`li.${TAB}`).childrens('a');
      this.index = 0;
      this._setupActiveTabLink();

      if (this.options.swipeable) {
        this._setupSwipeableTabs();
      } else {
        this._setupNormalTabs();
      }

      this._setTabsAndTabWidth();
      this._createIndicator();
      this._setupEventHandlers();
    }

    static get defaults() {
      return _defaults;
    }

    static init(els, options) {
      return super.init(this, els, options);
    }

    static getInstance(el) {
      return el.Sulai_Tabs;
    }

    destroy() {
      this._removeEventHandlers();
      this._indicator.parentNode.removeChild(this._indicator);

      if (this.options.swipeable) {
        this._teardownSwipeableTabs();
      } else {
        this._teardownNormalTabs();
      }

      this.el.Sulai_Tabs = undefined;
    }

    _setupEventHandlers() {
      this._handleWindowResizeBound = this._handleWindowResize.bind(this);
      window.addEventListener('resize', this._handleWindowResizeBound);

      this._handleTabClickBound = this._handleTabClick.bind(this);
      this.el.addEventListener('click', this._handleTabClickBound);
    }

    _removeEventHandlers() {
      window.removeEventListener('resize', this._handleWindowResizeBound);
      this.el.removeEventListener('click', this._handleTabClickBound);
    }

    _handleWindowResize() {
      this._setTabsAndTabWidth();

      if (this.tabWidth !== 0 && this.tabsWidth !== 0) {
        this._indicator.style.left = this._calcLeftPos(this.activeTabLink) + 'px';
        this._indicator.style.right = this._calcRightPos(this.activeTabLink) + 'px';
      }
    }

    _handleTabClick(e) {
      let tab = e.target.closest(`li.${TAB}`);
      let tabLink = e.target.closest('a');

      if (!tabLink || !tabLink.parentNode.classList.contains(`${TAB}`)) {
        return;
      }

      if (tab.classList.contains(`${DISABLED}`)) {
        e.preventDefault();
        return;
      }

      if (!!tabLink.target) {
        return;
      }

      this.activeTabLink.classList.remove(`${ACTIVE}`);
      let oldContent = this.content;

      this.activeTabLink = tabLink;
      this.content = document.querySelector(Sulai.escapeHash(tabLink.hash));
      this.tabLinks = this.el.childrens(`li.${TAB}`).childrens('a');

      this.activeTabLink.classList.add(`${ACTIVE}`);
      let prevIndex = this.index;
      this.index = Math.max(this.tabLinks.index(tabLink), 0); // Ragu

      if (this.options.swipeable) {
        if (this._tabsCarousel) {
          this._tabsCarousel.set(this.index, () => {
            if (typeof this.options.onShow === 'function') {
              this.options.onShow.call(this, this.content);
            }
          });
        }
      } else {
        if (this.content) {
          this.content.style.display = 'block';
          this.content.classList.add(`${ACTIVE}`);
          if (typeof this.options.onShow === 'function') {
            this.options.onShow.call(this, this.content);
          }

          if (oldContent && !oldContent.is(this.content)) {
            oldContent.style.display = 'none';
            oldContent.classList.remove(`${ACTIVE}`);
          }
        }
      }

      this._setTabsAndTabWidth();
      this._animateIndicator(prevIndex);
      e.preventDefault();
    }

    _createIndicator() {
      let indicator = document.createElement('li');
      indicator.classList.add(`${INDICATOR}`);

      this.el.appendChild(indicator);
      this._indicator = indicator;

      setTimeout(() => {
        this._indicator.style.left = this._calcLeftPos(this.activeTabLink) + 'px';
        this._indicator.style.right = this._calcRightPos(this.activeTabLink) + 'px';
      }, 0);
    }

    _setupActiveTabLink() {
      this.activeTabLink = this.tabLinks.filter((tabs) => {
        if (tabs.is('[href="' + location.hash + '"]')) {
          return tabs;
        }
      })[0]

      if (this.activeTabLink == undefined) {
        this.activeTabLink = this.el.childrens(`li.${TAB}`).childrens(`a.${ACTIVE}`)[0];
      }
      if (this.activeTabLink == undefined) {
        this.activeTabLink = this.el.childrens(`li.${TAB}`).childrens('a')[0];
      }

      this.tabLinks.forEach(tab => {
        tab.classList.remove(`${ACTIVE}`);
      });
      this.activeTabLink.classList.add(`${ACTIVE}`);

      this.index = Math.max(this.tabLinks.index(this.activeTabLink), 0);

      if (this.activeTabLink) {
        this.content = document.querySelector(Sulai.escapeHash(this.activeTabLink.hash));
        this.content.classList.add(`${ACTIVE}`);
      }
    }

    _setupSwipeableTabs() {
      if (window.innerWidth > this.options.responsiveThreshold) {
        this.options.swipeable = false;
      }

      let tabsContent;
      this.tabLinks.forEach((link) => {
        let currContent = Sulai.escapeHash(link.hash);
        currContent.classList.add(`${CAROUSEL_ITEM}`);
        tabsContent = currContent;
      });

      let tabsWrapper = Sulai.stringToElement('<div class="tabs-content carousel carousel-slider"></div>');
      tabsContent.insertAdjacentElement('beforebegin', tabsWrapper);
      tabsWrapper.appendChild(tabsContent);
      tabsContent.style.display = '';

      let activeTabIndex = this.activeTabLink.closest(`.${TAB}`).index();

      this._tabsCarousel = Sulai.Carousel.init(tabsWrapper, {
        fullWidth: true,
        noWrap: true,
        onCycleTo: (item) => {
          let prevIndex = this.index;
          this.index = item.index();
          this.activeTabLink.classList.remove(`${ACTIVE}`);
          this.activeTabLink = this.tabLinks.eq(this.index);
          this.activeTabLink.addClass(`${ACTIVE}`);
          this._animateIndicator(prevIndex);
          if (typeof this.options.onShow === 'function') {
            this.options.onShow.call(this, this.$content[0]);
          }
        }
      });

      // Set initial carousel slide to active tab
      this._tabsCarousel.set(activeTabIndex);
    }

    _teardownSwipeableTabs() {
      let tabsWrapper = this._tabsCarousel.el;
      this._tabsCarousel.destroy();

      tabsWrapper.insertAdjacentElement('afterend', tabsWrapper.children);
      tabsWrapper.remove();
    }

    _setupNormalTabs() {
      // Hide Tabs Content
      this.tabLinks.filter((link) => {
        if (!link.is(this.activeTabLink)) {
          if (!!link.hash) {
            let currContent = document.querySelector(Sulai.escapeHash(link.hash));
            if (currContent) {
              currContent.style.display = 'none';
            }
          }
        }
      })
    }

    _teardownNormalTabs() {
      // show Tabs Content
      this.tabLinks.forEach((link) => {
        if (!!link.hash) {
          let currContent = Sulai.escapeHash(link.hash)
          if (currContent.length) {
            currContent.style.display = '';
          }
        }
      });
    }

    _setTabsAndTabWidth() {
      this.tabsWidth = this.el.innerWidth();
      this.tabWidth = Math.max(this.tabsWidth, this.el.scrollWidth) / this.tabLinks.length;
    }

    _calcRightPos(el) {
      return Math.ceil(this.tabsWidth - el.offsetLeft - el.getBoundingClientRect().width);
    }

    _calcLeftPos(el) {
      return Math.floor(el.offsetLeft);
    }

    updateTabIndicator() {
      this._setTabsAndTabWidth();
      this._animateIndicator(this.index);
    }

    _animateIndicator(prevIndex) {
      let leftDelay = 0,
        rightDelay = 0;

      if (this.index - prevIndex >= 0) {
        leftDelay = 90;
      } else {
        rightDelay = 90;
      }

      this._indicator.anime({
        left: {
          "??px": [0, this._calcLeftPos(this.activeTabLink)]
        },
        right: {
          "??px": [0, this._calcRightPos(this.activeTabLink)]
        }
      }, this.options.duration, 'easeOutBounce')
    }

    select(tabId) {
      let tab = this.tabLinks.filter('[href="#' + tabId + '"]');
      if (tab.length) {
        tab.trigger('click');
      }
    }
  }

  Sulai.Tabs = Tabs;
})(window);

document.documentElement.ready(function () {
  Sulai.AutoInit();
  this.querySelectorAll('*').forEach(function (each) {
    toggle(each);
    dismiss(each);
  });
}, false);

function testAnimate(that) {
  that.anime({
    transform: {
      'scale(??, ??)': [0.3, 1],
      'translateY(??px)': [0, 400],
    },
    // opacity: [1, 0.1],
  }, 1000, 'easeOutBounce', function (anime) {
    console.log(anime);
  });
}