window.addEventListener('load', async function () {
  console.log({
    cookie: document.cookie
  });
})

function easeInQuad(x, t, b, c, d) {
  return c*(t/=d)*t + b;
}

function easeOutQuad(t, b, c, d) {
  return -c *(t/=d)*(t-2) + b;
}

function easeInOutQuad(t, b, c, d) {
  if ((t/=d/2) < 1) return c/2*t*t + b;
  return -c/2 * ((--t)*(t-2) - 1) + b;
}

function easeInCubic(t, b, c, d) {
  return c*(t/=d)*t*t + b;
}

function easeOutCubic(t, b, c, d) {
  return c*((t=t/d-1)*t*t + 1) + b;
}

function easeInOut(t, b, c, d) {
  if ((t/=d/2) < 1) return c/2*t*t*t + b;
  return c/2*((t-=2)*t*t + 2) + b;
}

function easeInQuart(t, b, c, d) {
  return c*(t/=d)*t*t*t + b;
}

function easeOutQuart(t, b, c, d) {
  return -c * ((t=t/d-1)*t*t*t - 1) + b;
}

function easeInOutQuart(t, b, c, d) {
  if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
  return -c/2 * ((t-=2)*t*t*t - 2) + b;
}

function easeInQuint(t, b, c, d) {
  return c*(t/=d)*t*t*t*t + b;
}

function easeOutQuint(t, b, c, d) {
  return c*((t=t/d-1)*t*t*t*t + 1) + b;
}

function easeInOutQuint(t, b, c, d) {
  if ((t/=d/2) < 1) return c/2*t*t*t*t*t + b;
  return c/2*((t-=2)*t*t*t*t + 2) + b;
}

function easeInSine(t, b, c, d) {
  return -c * Math.cos(t/d * (Math.PI/2)) + c + b;
}

function easeOutSine(t, b, c, d) {
  return c * Math.sin(t/d * (Math.PI/2)) + b;
}

function easeInOutSine(t, b, c, d) {
  return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
}

function easeInExpo(t, b, c, d) {
  return (t==0) ? b : c * Math.pow(2, 10 * (t/d - 1)) + b;
}

function easeOutExpo(t, b, c, d) {
  return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
}

function easeInOutExpo(t, b, c, d) {
  if (t==0) return b;
  if (t==d) return b+c;
  if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
  return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
}

function easeInCirc(t, b, c, d) {
  return -c * (Math.sqrt(1 - (t/=d)*t) - 1) + b;
}

function easeOutCirc(t, b, c, d) {
  return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
}

function easeInOutCirc(t, b, c, d) {
  if ((t/=d/2) < 1) return -c/2 * (Math.sqrt(1 - t*t) - 1) + b;
  return c/2 * (Math.sqrt(1 - (t-=2)*t) + 1) + b;
}

function easeInElastic(t, b, c, d) {
  var s=1.70158;var p=0;var a=c;
  if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
  if (a < Math.abs(c)) { a=c; var s=p/4; }
  else var s = p/(2*Math.PI) * Math.asin (c/a);
  return -(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
}

function easeOutElastic(t, b, c, d) {
  var s=1.70158;var p=0;var a=c;
  if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
  if (a < Math.abs(c)) { a=c; var s=p/4; }
  else var s = p/(2*Math.PI) * Math.asin (c/a);
  return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
}

function easeInOutElastic(t, b, c, d) {
  var s=1.70158;var p=0;var a=c;
  if (t==0) return b;  if ((t/=d/2)==2) return b+c;  if (!p) p=d*(.3*1.5);
  if (a < Math.abs(c)) { a=c; var s=p/4; }
  else var s = p/(2*Math.PI) * Math.asin (c/a);
  if (t < 1) return -.5*(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
  return a*Math.pow(2,-10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )*.5 + c + b;
}

function easeInBack(t, b, c, d, s) {
  if (s == undefined) s = 1.70158;
  return c*(t/=d)*t*((s+1)*t - s) + b;
}

function easeOutBack(t, b, c, d, s) {
  if (s == undefined) s = 1.70158;
  return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
}

function easeInOutBack(t, b, c, d, s) {
  if (s == undefined) s = 1.70158; 
  if ((t/=d/2) < 1) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;
  return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;
}

function easeInBounce(x, t, b, c, d) {
  return c - easeOutBounce(d-t, 0, c, d) + b;
}

function easeOutBounce(t, b, c, d) {
  if ((t/=d) < (1/2.75)) {
    return c*(7.5625*t*t) + b;
  } else if (t < (2/2.75)) {
    return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
  } else if (t < (2.5/2.75)) {
    return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
  } else {
    return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
  }
}

function easeInOutBounce(t, b, c, d) {
  if (t < d/2) return easeInBounce(t*2, 0, c, d) * .5 + b;
  return easeOutBounce(t*2-d, 0, c, d) * .5 + c*.5 + b;
}

function animate(duration, ease) {
  // Untuk Animate Ini Masih Jauh Dari Sempurna Akan Saya Lanjutkan Apabila PrpJect Ini Terus Di Lanjutkan
  if (this.currentStep == undefined) {
    this.currentStep = 0;
  }
  if (this.frameRate == undefined) {
    this.frameRate = 15 / 250;
  }
  this.currentStep++;
  this.to.style[this.do[0]] = this.do[1].replace("??", window[ease](this.currentStep, this.start, this.end - this.start, this.frameRate * duration));
  if (this.currentStep >= this.frameRate * duration) {return};
  requestAnimationFrame(animate.bind(this, duration, ease));
}

function trans() {
  document.documentElement.classList.add('transition');
  setTimeout(() => {
    document.documentElement.classList.remove('transition');
  }, getTransitionDurationFromElement(document.documentElement))
}

function fullHeight(element) {
  let elmHeight, elmMargin, elm = element;
  if(document.all) {
      elmHeight = parseInt(elm.currentStyle.height);
      elmMargin = parseInt(elm.currentStyle.marginTop, 10) + parseInt(elm.currentStyle.marginBottom, 10);
  } else {
      elmHeight = parseInt(document.defaultView.getComputedStyle(elm, '').getPropertyValue('height'));
      elmMargin = parseInt(document.defaultView.getComputedStyle(elm, '').getPropertyValue('margin-top')) + parseInt(document.defaultView.getComputedStyle(elm, '').getPropertyValue('margin-bottom'));
  }
  return (elmHeight+elmMargin);
}

function getTransitionDurationFromElement(element) {
  if (!element) {
    return 0
  }
  let {transitionDuration,transitionDelay } = window.getComputedStyle(element)
  const floatTransitionDuration = parseFloat(transitionDuration)
  const floatTransitionDelay = parseFloat(transitionDelay)
  if (!floatTransitionDuration && !floatTransitionDelay) {
    return 0
  }
  transitionDuration = transitionDuration.split(',')[0]
  transitionDelay = transitionDelay.split(',')[0]
  return (parseFloat(transitionDuration) + parseFloat(transitionDelay)) * 1000
}

function dropShow(each, event) {
  each.setAttribute('aria-expanded','true');
  each.nextElementSibling.classList.add('show');
  event.stopPropagation();
}

function dropHide(each, event) {
  each.setAttribute('aria-expanded','false');
  each.nextElementSibling.classList.remove('show');
  event.stopPropagation();
}

function collapseShow(each) {
  let target = document.querySelector(each.dataset.target);
  
  each.setAttribute('aria-expanded','true');
  each.classList.toggle('collapsed');

  target.classList.replace('collapse','collapsing');
  target.style.height = fullHeight(target.children[0]) + 'px';

  setTimeout(() => {
    target.classList.replace('collapsing','collapse');
    target.style.removeProperty('height');
    target.classList.toggle('show');
  }, getTransitionDurationFromElement(target))
}

function collapseHide(each) {
  let target = document.querySelector(each.dataset.target);

  each.setAttribute('aria-expanded','false');
  each.classList.toggle('collapsed');
  
  target.classList.toggle('show');
  target.classList.replace('collapse','collapsing');
  target.style.height = '0px';
  
  setTimeout(() => {
    target.style.removeProperty('height');
    target.classList.replace('collapsing','collapse');
  }, getTransitionDurationFromElement(target))
  
}

function modalShow(each, options) {
  let body = document.body;
  body.setAttribute('data-padding-right','')
  body.style.paddingRight = window.getComputedStyle(document.documentElement, '::-webkit-scrollbar').getPropertyValue('width');
  body.classList.add('modal-open');
  
  let modal = document.querySelector(each.dataset.target);
  modal.style.display = 'block';
  modal.style.paddingRight = window.getComputedStyle(document.documentElement, '::-webkit-scrollbar').getPropertyValue('width');

  setTimeout(() => {
    modal.classList.add('show');
  }, getTransitionDurationFromElement(modal))
  
  let backdrop = document.createElement('div');
  backdrop.classList.add('modal-backdrop', 'fade', 'show');
  document.body.appendChild(backdrop);

  document.addEventListener('click', function (e) {
    if (e.target === modal) {
      modalHide(modal);
    }
  })
}

function modalHide(modal) {
  modal.classList.remove('show');
  setTimeout(() => {
    modal.style.removeProperty('display');
  }, getTransitionDurationFromElement(modal))

  if (document.querySelector('.modal-backdrop:last-child') != null) {
    document.querySelector('.modal-backdrop:last-child').remove();
  }

  let body = document.body;
  body.removeAttribute('data-padding-right');
  body.classList.remove('modal-open');
  body.style.removeProperty('padding-right');
}

if (localStorage.getItem('theme')) {
  document.documentElement.setAttribute('data-theme', localStorage.getItem('theme'))
}

async function getCookie(name) {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) return parts.pop().split(';').shift();
}

async function editMenu(params) {
  document.querySelectorAll(`#updateSideMenuForm input[type=checkbox]`).forEach(element => {
    element.removeAttribute('checked');
  });
  document.querySelector(`#updateSideMenuForm`).action = `/members/sidemenu?id=${params.id}&_csrf=${document.querySelector('meta[name="csrf-token"]').getAttribute('content')}&_method=PUT`
  document.querySelector(`#updateSideMenuForm input[name=menu]`).value = params.menu;
  document.querySelector(`#updateSideMenuForm input[name=isActive]`).setAttribute(params.isActive == 'true' ? 'checked' : 'checked', '');
  params.other.split(',').forEach(element => {
    document.querySelector(`#updateSideMenuForm input[name=${element}]`).setAttribute('checked', 'checked');
  });
}

async function editSubMenu(params) {
  document.querySelectorAll(`#updateMenuForm input[type=checkbox]`).forEach(element => {
    element.removeAttribute('checked');
  });
  params.menuId = params.menuId - 1;
  document.querySelector(`#updateMenuForm`).action = `/members/sidemenu/menu?id=${params.id}&_csrf=${document.querySelector('meta[name="csrf-token"]').getAttribute('content')}&_method=PUT`
  document.querySelectorAll(`#updateMenuForm select[name=menuId] option`)[params.menuId].setAttribute('selected', 'selected')
  document.querySelector(`#updateMenuForm input[name=icon]`).value = params.icon;
  document.querySelector(`#updateMenuForm use`).setAttribute('xlink:href', `/vendor/bootstrap-icons/bootstrap-icons.svg#${params.icon}`);
  document.querySelector(`#updateMenuForm input[name=title]`).value = params.title;
  document.querySelector(`#updateMenuForm input[name=url]`).value = params.url;
  document.querySelector(`#updateMenuForm input[name=isActive]`).setAttribute(params.isActive == 'true' ? 'checked' : 'checked', '');
  params.other.split(',').forEach(element => {
    document.querySelector(`#updateMenuForm input[name=${element}]`).setAttribute('checked', 'checked');
  });
}

async function editCollapseMenu(params) {
  document.querySelectorAll(`#updateSubMenuForm input[type=checkbox]`).forEach(element => {
    element.removeAttribute('checked');
  });
  params.subMenuId = params.subMenuId - 1;
  document.querySelector(`#updateSubMenuForm`).action = `/members/sidemenu/submenu?id=${params.id}&_csrf=${document.querySelector('meta[name="csrf-token"]').getAttribute('content')}&_method=PUT`
  document.querySelectorAll(`#updateSubMenuForm select[name=subMenuId] option`)[params.subMenuId].setAttribute('selected', 'selected')
  document.querySelector(`#updateSubMenuForm input[name=title]`).value = params.title;
  document.querySelector(`#updateSubMenuForm input[name=url]`).value = params.url;
  document.querySelector(`#updateSubMenuForm input[name=isActive]`).setAttribute(params.isActive == 'true' ? 'checked' : 'checked', '');
  params.other.split(',').forEach(element => {
    document.querySelector(`#updateSubMenuForm input[name=${element}]`).setAttribute('checked', 'checked');
  });
}

async function noneBlock(params) {
  if (params.this.nextElementSibling) {
    params.this.nextElementSibling.classList.toggle('d-none');
  }
  if (params.this.previousElementSibling) {
    params.this.previousElementSibling.classList.toggle('d-none');
  }
  params.this.classList.toggle('d-none');
  params.this.parentNode.previousElementSibling.children[0].classList.toggle('d-none');
  params.this.parentNode.previousElementSibling.children[1].classList.toggle('d-none');
}

function setModalValue(params) {
  Object.keys(params).forEach(id => {
    document.querySelector(`#${id}`).value = params[id];
  });
}

async function sulaiForm(params) {
  params.event.preventDefault();
  await formFetch(params).then((prom) => {
    if (prom.redirected) {
      params.this.querySelector('.spinner-border').classList.toggle('d-none');
      window.location.replace(prom.url)
    } else {
      return prom.json();
    }
  }).then((response) => {
    setFormErrorMate(params, response)
  })
}

async function changeForm(params) {
  params.event.preventDefault();
  const formData = new FormData(params.this)
  modalShow(params.this);
  document.querySelector('#changeForm').onsubmit = async function (event) {
    event.preventDefault();
    fetch(`${params.link}?${Array.from(formData.keys()).toString()}=${Array.from(formData.values()).toString()}`, {
      method: params.method,
      headers: {
        'CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      },
      body: new FormData(this)
    }).then((prom) => {
      this.querySelector('.spinner-border').classList.toggle('d-none');
      if (prom.redirected) {
        window.location.replace(prom.url)
      } else {
        return prom.json();
      }
    }).then((response) => {
      Object.keys(response).forEach((type) => {
        response[type].forEach((err) => {
          if (err.location != 'param') {
            if (err.param != 'yourpassword') {
              confirmModal.hide();
              console.log(err.param);
              const inputForm = params.this.querySelector(`#${err.param}`)
              const helperText = inputForm.nextElementSibling
              inputForm.classList.add('invalid')
              helperText.dataset.error = err.msg;
            } else {
              const passForm = this.querySelector(`#${err.param}`)
              const passHelperText = passForm.nextElementSibling.nextElementSibling
              passForm.classList.add('invalid')
              passHelperText.dataset.error = err.msg;
            }
          }
        })
      })
    })
  }
}

async function regisForm(params) {
  params.event.preventDefault();
  await formFetch(params).then((prom) => {
    if (prom.status == 200) {
      prom.json().then((response) => {
        params.this.querySelector('.spinner-border').classList.toggle('d-none');
        document.querySelector('#verifyForm input[name="identify"]').setAttribute('value', response.results)
        modalShow(params.this);
      })
    } else {
      return prom.json();
    }
  }).then((response) => {
    setFormErrorMate(params, response)
  })
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
  params.this.querySelector('.spinner-border').classList.toggle('d-none');
  let verify = '';
  params.this.querySelectorAll('#verify input').forEach(element => {
    verify = verify + element.value
  });
  const formData = new FormData(params.this)
  formData.set('verify',verify.toUpperCase())
  fetch(params.link, {
    credentials: 'same-origin',
    method: params.method,
    headers: {
      'CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body:formData
  }).then((prom) => {
    if (prom.redirected) {
      params.this.querySelector('.spinner-border').classList.toggle('d-none');
      params.this.querySelector('.input-field').innerHTML = `<strong>Your email has been verified</strong>`
      setTimeout(async function () {
        window.location.replace(prom.url)
      }, 5000)
    } else {
      return prom.json();
    }
  }).then((response) => {
    params.this.querySelector('.spinner-border').classList.toggle('d-none');
    Object.keys(response).forEach((type) => {
      response[type].forEach((err) => {
        params.this.querySelectorAll(`#verify input`).forEach(element => {
          element.classList.add('invalid')
        })
        params.this.querySelector('.helper-text').dataset.error = err.msg;
      })
    })
  })
}

async function forgotForm(params) {
  params.event.preventDefault();
  await formFetch(params).then((prom) => {
    if (prom.status == 200) {
      params.this.querySelector('.spinner-border').classList.toggle('d-none');
      params.this.querySelector('.input-field').innerHTML = `<strong>Request has been send</strong>`;
    } else {
      return prom.json();
    }
  }).then((response) => {
    setFormErrorMate(params, response)
  })
}

async function setFormErrorMate(params, response) {
  params.this.querySelector('.spinner-border').classList.toggle('d-none');
  Object.keys(response).forEach((type) => {
    response[type].forEach((err) => {
      if (err.location != 'param' && err.location != 'query') {
        const inputForm = params.this.querySelector(`#${err.param}`)
        const helperText = inputForm.nextElementSibling.nextElementSibling
        inputForm.classList.add('invalid')
        helperText.dataset.error = err.msg;
      }
    })
  })
}

async function setFormErrorBoot(params, response) {
  params.this.querySelector('.spinner-border').classList.toggle('d-none');
  Object.keys(response).forEach((type) => {
    response[type].forEach((err) => {
      const inputForm = params.this.querySelector(`#${err.param}`)
      const helperText = inputForm.nextElementSibling
      inputForm.classList.add('is-invalid')
      helperText.classList.add('invalid-feedback')
      helperText.innerHTML = err.msg;
    })
  })
}

async function DEBUG(params) {
  params.event.preventDefault();
  await formFetch(params).then((prom) => {
    if (params.this.querySelector('.spinner-border')) {
      params.this.querySelector('.spinner-border').classList.toggle('d-none');
    }
    console.log(prom);
    return prom.text();
  }).then((response) => {
    console.log(response);
  })
}

async function formFetch(params) {
  return await fetch(params.link, {
    credentials: 'same-origin',
    method: params.method,
    headers: {
      "Content-Type":"application/x-form-urlencoded",
      'CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: new FormData(params.this)
  }).then((promise) => {
    return promise;
  })
}

document.querySelector('#switchTheme').addEventListener('change', function (e) {
  if (this.checked) {
    trans()
    document.documentElement.setAttribute('data-theme', 'dark')
    document.querySelectorAll('.btn-close').forEach(element => {
      element.classList.toggle('btn-close-white')
    })
    localStorage.setItem('theme', 'dark')
  } else {
    trans()
    document.documentElement.setAttribute('data-theme', 'light')
    document.querySelectorAll('.btn-close').forEach(element => {
      element.classList.toggle('btn-close-white')
    })
    localStorage.setItem('theme', 'light')
  }
})

document.querySelector('#switchTheme').setAttribute(localStorage.getItem('theme') == 'dark' ? 'checked' : 'value', '');

document.addEventListener('DOMContentLoaded', function () {
  this.querySelectorAll('*').forEach(function (each) {
    toggle(each);
    dismiss(each);
  })
  // let elems = document.querySelectorAll('select.materialize-style');
  // let options = document.querySelectorAll('option');
  // let instances = M.FormSelect.init(elems, options);
  // document.querySelector('table.display').DataTable();
}, false);

function dismiss(each) {
  if (each.dataset.dismiss ?? false) {
    switch (each.dataset.dismiss) {
      case 'modal':
        each.addEventListener('click', function (e) {
          modalHide(this.closest('.modal'));
        })
        break;

      default:
        console.log(each.dataset.toggle);
        break;
    }
  }
}

function toggle(each) {
  if (each.dataset.toggle ?? false) {
    switch (each.dataset.toggle) {
      case 'dropdown':
        each.addEventListener('click', function (event) {
          if (this.getAttribute('aria-expanded') == 'true') {
            dropHide(this, event)
          } else {
            dropShow(this, event);
          }

          document.addEventListener('click', function (e) {
            if (e.target.closest('.dropdown-menu') != each.nextElementSibling) {
              dropHide(each, event);
            }
          })
        })
        break;
      case 'collapse':
        each.setAttribute('aria-expanded','false');
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
        })
        break;
      case 'modal':
        each.addEventListener('click', function (e) {
          modalShow(each);
        })
        break;

      default:
        console.log(each.dataset.toggle);
        break;
    }
  }
}

document.querySelectorAll("#sidebarToggle, #sidebarToggleTop").forEach(each => {
  each.addEventListener('click', function (e) {
    document.body.classList.toggle("sidebar-toggled");
    document.querySelector(".sidebar").classList.toggle("toggled");
    if (document.querySelector(".sidebar").classList.contains("toggled")) {
      document.querySelector(".sidebar").style.transition = 'all 200ms';
      document.querySelector(".sidebar .collapse").style.transition = 'all 200ms';
    }
  });
})

document.addEventListener('resize', function() {
  if (getWidth(document) < 768) {
    document.querySelector(".sidebar").style.transition = 'all 200ms';
    document.querySelector(".sidebar .collapse").style.transition = 'all 200ms';
  }
})

document.addEventListener('scroll', function () {
  // console.log(document.documentElement.scrollTop);
  if (document.documentElement.scrollTop > 100) {
    document.querySelector('.scroll-to-top').style.display = 'block';
    animate.bind({
      to: document.querySelector('.scroll-to-top'),
      do: ['opacity', '??'],
      start: 0,
      end: 1,
    }, 500, 'easeInOutExpo')();
  } else {
    animate.bind({
      to: document.querySelector('.scroll-to-top'),
      do: ['opacity', '??'],
      start: 0,
      end: 1,
    }, 500, 'easeInOutExpo')();
    document.querySelector('.scroll-to-top').style.display = 'none';
  }
});

document.querySelector('a.scroll-to-top').addEventListener('click', function (e) {
  window.scrollTo({top: 0, behavior: 'smooth'});
});

document.querySelectorAll('.spinner-border').forEach(spin => {
  spin.parentNode.addEventListener('click', function () {
    this.querySelector('.spinner-border').classList.remove('d-none');
  })
});

document.querySelector(".search-field").addEventListener("focus", function () {
  document.querySelectorAll('.search-hide').forEach(hide => {
    if (window.innerWidth <= 768) {
      hide.classList.replace('d-flex', 'd-none')
    }
  });
});

document.querySelector(".search-field").addEventListener("focusout", function () {
  document.querySelectorAll('.search-hide').forEach(hide => {
    if (window.innerWidth <= 768) {
      setTimeout(() => {
        hide.classList.replace('d-none', 'd-flex')
      }, 200)
    }
  });
});

document.getElementById('search-input').addEventListener('keyup', searchEngine);
document.getElementById('search-input').addEventListener('focus', searchEngine);

function searchEngine(e) {
  let input = document.getElementById('search-input');
  let html = '';
  let matchingResults = [];
  let heading = document.querySelector('.search-heading');

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
      <li>
        <a class="grey-text text-decoration-none" href="${el.link}">
          ${boldString(el.title, input.value)}
        </a>
      </li>
      `
    })
    document.querySelector('.popup-list').innerHTML = html;
  } else {
    html = `<li>There are no suggestions for your query.</li>`
    document.querySelector('.popup-list').innerHTML = html;
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
  var re = new RegExp(find, 'i');
  find = re.exec(str);
  return str.replace(re, '<b>' + find + '</b>');
}