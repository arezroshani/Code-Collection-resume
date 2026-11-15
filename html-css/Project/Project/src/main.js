import "@fontsource/vazirmatn";          // لود کل فونت




import './style.css';


console.log("فونت vazirmatn لود شد!");


//index.html
const menuToggle = document.getElementById('menuToggle');
const mobileMenu = document.getElementById('mobileMenu');

if (menuToggle && mobileMenu) {
  menuToggle.addEventListener('click', () => {
    const isOpen = mobileMenu.classList.contains('translate-x-0');
    if (isOpen) {
      mobileMenu.classList.replace('translate-x-0', 'translate-x-full');
    } else {
      mobileMenu.classList.replace('translate-x-full', 'translate-x-0');
    }
  });
}

// تب ها
const tabButtons = document.querySelectorAll('.tab-btn');
const tabContents = document.querySelectorAll('.tab-content');

if (tabButtons.length && tabContents.length) {
  tabButtons.forEach(button => {
    button.addEventListener('click', () => {
      tabButtons.forEach(btn => btn.classList.remove('active'));
      tabContents.forEach(content => content.classList.remove('active'));
      button.classList.add('active');
      const tabContent = document.getElementById(button.dataset.tab);
      if (tabContent) tabContent.classList.add('active');
    });
  });
}

document.addEventListener("DOMContentLoaded", function () {
  const searchToggle = document.getElementById('searchToggle');
  const searchBox = document.getElementById('searchBox');
  const searchIcon = document.getElementById('searchIcon');

  if (searchToggle && searchBox && searchIcon) {
    searchToggle.addEventListener('click', () => {
      const isHidden = searchBox.classList.contains('hidden');

      if (isHidden) {
        searchBox.classList.remove('hidden', 'opacity-0', 'pointer-events-none');
        searchBox.classList.add('opacity-100', 'pointer-events-auto');

        searchIcon.classList.remove('uil-search');
        searchIcon.classList.add('uil-times');
      } else {
        searchBox.classList.add('hidden', 'opacity-0', 'pointer-events-none');
        searchBox.classList.remove('opacity-100', 'pointer-events-auto');

        searchIcon.classList.remove('uil-times');
        searchIcon.classList.add('uil-search');
      }
    });
  }
});


const visitBtn = document.getElementById("visit-btn");
const visitModal = document.getElementById("visit-modal");
const closeModal = document.getElementById("close-modal");
const visitForm = document.getElementById("visit-form");
const thankyouMsg = document.getElementById("thankyou-msg");

if (visitBtn && visitModal && closeModal) {
  // باز کردن مودال
  visitBtn.addEventListener("click", () => {
    visitModal.classList.remove("hidden");
    setTimeout(() => {
      visitModal.querySelector("div").classList.remove("scale-90", "opacity-0");
    }, 10);
  });

  // بستن مودال
  closeModal.addEventListener("click", () => {
    visitModal.querySelector("div").classList.add("scale-90", "opacity-0");
    setTimeout(() => {
      visitModal.classList.add("hidden");
    }, 300);
  });
}

document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("visit-form");
  const thankYouMsg = document.getElementById("thankyou-msg");
  const modal = document.getElementById("visit-modal");

  if (!form || !thankYouMsg || !modal) return;

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const name = form.name.value.trim();
    const phone = form.phone.value.replace(/[^\d]/g, "").trim();
    const email = form.email.value.trim();

    const phoneRegex = /^\d{11}$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    let errors = [];

    if (name.length < 2) {
      errors.push("لطفاً نام معتبر وارد کنید.");
    }

    if (!phoneRegex.test(phone)) {
      errors.push("شماره تماس باید دقیقاً 11 رقم عددی باشد.");
    }

    if (!emailRegex.test(email)) {
      errors.push("ایمیل معتبر نیست.");
    }

    if (errors.length > 0) {
      alert(errors.join("\n"));
      return;
    }

    thankYouMsg.classList.remove("hidden");
    form.reset();

    setTimeout(() => {
      thankYouMsg.classList.add("hidden");
      modal.classList.add("hidden");
    }, 4000);
  });

  // دکمه باز کردن مودال
  const visitBtn = document.getElementById("visit-btn");
  if (visitBtn) {
    visitBtn.addEventListener("click", () => {
      modal.classList.remove("hidden");
      setTimeout(() => {
        modal.querySelector('div').classList.remove('scale-90', 'opacity-0');
        modal.querySelector('div').classList.add('scale-100', 'opacity-100');
      }, 10);
    });
  }

  // دکمه بستن مودال
  const closeModal = document.getElementById("close-modal");
  if (closeModal) {
    closeModal.addEventListener("click", () => {
      modal.querySelector('div').classList.add('scale-90', 'opacity-0');
      modal.querySelector('div').classList.remove('scale-100', 'opacity-100');
      setTimeout(() => {
        modal.classList.add("hidden");
      }, 300);
    });
  }
});

// مختصات دقیق آدرس 
const position = [51.3925, 35.8097]; // [longitude, latitude] ولنجک، کامرانیه شمالی

if (document.getElementById("map")) {
  const map = new ol.Map({
    target: "map",
    key: "web.2cbbff7d642945f894245b0833f20131", // کلید شما
    maptype: "neshan",
    poi: true,
    traffic: false,
    view: new ol.View({
      center: ol.proj.fromLonLat(position),
      zoom: 16,
    }),
  });

  const markerFeature = new ol.Feature({
    geometry: new ol.geom.Point(ol.proj.fromLonLat(position)),
  });

  markerFeature.setStyle(
    new ol.style.Style({
      image: new ol.style.Icon({
        src: "https://static.neshan.org/sdk/openlayers/marker.png",
        anchor: [0.5, 1],
        scale: 1,
      }),
    })
  );

  const vectorLayer = new ol.layer.Vector({
    source: new ol.source.Vector({
      features: [markerFeature],
    }),
  });

  map.addLayer(vectorLayer);
}





//paybillj

const bankLogos = {
  "بانک ملی": "./img/melibank.jpg",
  "بانک ملت": "./img/melat2.png",
  "بانک سامان": "./img/samanbank.png",
  "بانک تجارت": "./img/tejart.png",
  "بانک صادرات": "./img/saderat.jpg",
  "بانک آینده": "./img/ayandebank.jpg",
  "بانک پاسارگاد": "./img/bankpasargad2.jpg",
  "بانک سینا": "./img/sina.png",
  "بانک مسکن": "./img/maskan2bank.jpg",
  "بانک انصار": "./img/BAnsar.png",
  "بانک سپه": "./img/Sepahbank.webp",
  "بانک کشاورزی": "./img/keshavarzi.png",
  "بانک شهر": "./img/bankshahr.png",
  "بانک پارسیان": "./img/parsianbank.webp",
};

// تابع به‌روزرسانی بانک
function updateBankName() {
  const inputEl = document.getElementById("bankNameInput");
  const bankNameText = document.getElementById("bankNameText");
  const bankLogo = document.getElementById("bankLogo");

  if (!inputEl || !bankNameText || !bankLogo) return;

  const input = inputEl.value.trim();
  bankNameText.textContent = input || "بانک شما";

  if (bankLogos[input]) {
    bankLogo.src = bankLogos[input];
    bankLogo.classList.remove("hidden");
  } else {
    bankLogo.src = "";
    bankLogo.classList.add("hidden");
  }
}
window.updateBankName = updateBankName;

// فرمت شماره کارت
const cardNumber = document.getElementById("cardNumber");
if (cardNumber) {
  cardNumber.addEventListener("input", e => {
    const formatted = e.target.value.replace(/\D/g, '').replace(/(.{4})/g, '$1 ').trim();
    e.target.value = formatted;

    const preview = document.getElementById("cardNumberPreview");
    if (preview) preview.textContent = formatted || "**** **** **** ****";
  });
}

// فقط حروف فارسی برای نام دارنده
const cardHolder = document.getElementById("cardHolder");
if (cardHolder) {
  cardHolder.addEventListener("input", e => {
    e.target.value = e.target.value.replace(/[^آ-ی\s]/g, '');
    const preview = document.getElementById("cardHolderPreview");
    if (preview) preview.textContent = e.target.value ? "نام دارنده: " + e.target.value : "نام دارنده: ---";
  });
}

// تاریخ انقضا
const expDate = document.getElementById("expDate");
if (expDate) {
  expDate.addEventListener("input", e => {
    let val = e.target.value.replace(/[^\d]/g, "");
    if (val.length > 2) val = val.slice(0, 2) + "/" + val.slice(2, 4);
    e.target.value = val;

    const preview = document.getElementById("expDatePreview");
    if (preview) preview.textContent = val ? "انقضا: " + val : "انقضا: --/--";
  });
}

// CVV
const cvv = document.getElementById("cvv");
if (cvv) {
  cvv.addEventListener("input", e => {
    let val = e.target.value.replace(/\D/g, "");
    e.target.value = val;
    const preview = document.getElementById("cvvPreview");
    if (preview) preview.textContent = val.padEnd(4, "*") || "****";
  });
}

// CAPTCHA
const canvas = document.getElementById('captchaCanvas');
const ctx = canvas?.getContext('2d');
const refreshBtn = document.getElementById('refreshCaptcha');
const captchaInput = document.getElementById('captchaInput');
const errorMsg = document.getElementById('captchaError');

let captchaText = '';

function generateCaptchaText(length = 6) {
  const chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ0123456789';
  let result = '';
  for (let i = 0; i < length; i++) {
    result += chars.charAt(Math.floor(Math.random() * chars.length));
  }
  return result;
}

function drawCaptcha(text) {
  if (!canvas || !ctx) return;

  const width = canvas.width;
  const height = canvas.height;
  ctx.clearRect(0, 0, width, height);

  const gradient = ctx.createLinearGradient(0, 0, width, height);
  gradient.addColorStop(0, '#fffaf0');
  gradient.addColorStop(1, '#ffffff');
  ctx.fillStyle = gradient;
  ctx.fillRect(0, 0, width, height);

  for (let i = 0; i < 15; i++) {
    ctx.strokeStyle = `rgba(0, 0, 0, 0.${Math.floor(Math.random() * 2 + 1)})`;
    ctx.beginPath();
    const y = Math.random() * height;
    ctx.moveTo(0, y);
    ctx.lineTo(width, y);
    ctx.stroke();

    ctx.beginPath();
    const x = Math.random() * width;
    ctx.moveTo(x, 0);
    ctx.lineTo(x, height);
    ctx.stroke();
  }

  const letterSpacing = width / (text.length + 1);
  for (let i = 0; i < text.length; i++) {
    const letter = text[i];
    const fontSize = 28 + Math.random() * 6;
    ctx.font = `${fontSize}px Vazirmatn, sans-serif`;
    ctx.textBaseline = 'middle';

    const x = letterSpacing * (i + 1);
    const y = height / 2 + (Math.random() * 8 - 4);

    const angle = (Math.random() * 30 - 15) * Math.PI / 180;
    ctx.save();
    ctx.translate(x, y);
    ctx.rotate(angle);

    const colors = ['#444444', '#666666', '#222222', '#000000'];
    ctx.fillStyle = colors[Math.floor(Math.random() * colors.length)];
    ctx.shadowColor = 'rgba(0,0,0,0.2)';
    ctx.shadowBlur = 1;

    ctx.fillText(letter, 0, 0);
    ctx.restore();
  }

  for (let i = 0; i < 5; i++) {
    ctx.strokeStyle = `rgba(100,100,100,0.${Math.floor(Math.random() * 2 + 1)})`;
    ctx.beginPath();
    ctx.moveTo(Math.random() * width, Math.random() * height);
    ctx.lineTo(Math.random() * width, Math.random() * height);
    ctx.stroke();
  }
}

function refreshCaptcha() {
  if (!captchaInput || !errorMsg) return;
  captchaText = generateCaptchaText();
  drawCaptcha(captchaText);
  captchaInput.value = '';
  errorMsg.classList.add('hidden');
}

refreshBtn?.addEventListener('click', refreshCaptcha);
if (canvas && ctx) refreshCaptcha();

// هندل فرم پرداخت
const form = document.querySelector('.payment-form');
if (form) {
  form.addEventListener('submit', function (e) {
    e.preventDefault();

    const fields = {
      cardNumber: document.getElementById('cardNumber')?.value.replace(/\s/g, '') || '',
      cardHolder: document.getElementById('cardHolder')?.value.trim() || '',
      expDate: document.getElementById('expDate')?.value.trim() || '',
      cvv: document.getElementById('cvv')?.value.trim() || '',
      password: document.getElementById('password')?.value.trim() || '',
      captchaInput: captchaInput?.value.trim().toUpperCase() || ''
    };

    const errors = {
      cardNumber: document.getElementById('cardNumberError'),
      cardHolder: document.getElementById('cardHolderError'),
      expDate: document.getElementById('expDateError'),
      cvv: document.getElementById('cvvError'),
      password: document.getElementById('passwordError'),
      captchaInput: errorMsg
    };

    Object.values(errors).forEach(err => {
      if (err) {
        err.textContent = '';
        err.classList.add('hidden');
      }
    });

    let isValid = true;

    if (!/^\d{16}$/.test(fields.cardNumber)) {
      if (errors.cardNumber) {
        errors.cardNumber.textContent = 'شماره کارت باید ۱۶ رقم باشد.';
        errors.cardNumber.classList.remove('hidden');
      }
      isValid = false;
    }

    if (fields.cardHolder.length < 3) {
      if (errors.cardHolder) {
        errors.cardHolder.textContent = 'نام دارنده معتبر نیست.';
        errors.cardHolder.classList.remove('hidden');
      }
      isValid = false;
    }

    if (!/^(0[1-9]|1[0-2])\/\d{2}$/.test(fields.expDate)) {
      if (errors.expDate) {
        errors.expDate.textContent = 'تاریخ میلادی وارد کنید.';
        errors.expDate.classList.remove('hidden');
      }
      isValid = false;
    } else {
      const [monthStr, yearStr] = fields.expDate.split('/');
      const month = parseInt(monthStr, 10);
      const year = parseInt(yearStr, 10);
      const now = new Date();
      const currentYear = now.getFullYear() % 100;
      const currentMonth = now.getMonth() + 1;

      if (year < currentYear || (year === currentYear && month < currentMonth)) {
        if (errors.expDate) {
          errors.expDate.textContent = 'تاریخ انقضا معتبر نیست.';
          errors.expDate.classList.remove('hidden');
        }
        isValid = false;
      }
    }

    if (!/^\d{3,4}$/.test(fields.cvv)) {
      if (errors.cvv) {
        errors.cvv.textContent = 'کد CVV باید ۳ یا ۴ رقم باشد.';
        errors.cvv.classList.remove('hidden');
      }
      isValid = false;
    }

    if (!/^\d{6}$/.test(fields.password)) {
      if (errors.password) {
        errors.password.textContent = 'رمز پویا باید ۶ رقم باشد.';
        errors.password.classList.remove('hidden');
      }
      isValid = false;
    }

    if (fields.captchaInput !== captchaText) {
      if (errors.captchaInput) {
        errors.captchaInput.textContent = 'کد امنیتی صحیح نیست.';
        errors.captchaInput.classList.remove('hidden');
      }
      isValid = false;
    }

    if (isValid) {
      alert('پرداخت با موفقیت انجام شد!');
    }
  });
}

// اتوفوکوس به فیلد بعدی
function autoFocusNext(currentId, nextId, maxLength) {
  const current = document.getElementById(currentId);
  current?.addEventListener("input", () => {
    if (current.value.length >= maxLength) {
      const next = document.getElementById(nextId);
      next?.focus();
    }
  });
}

autoFocusNext("cardNumber", "cardHolder", 19);
autoFocusNext("cardHolder", "expDate", 18);
autoFocusNext("expDate", "cvv", 5);
autoFocusNext("cvv", "password", 4);
autoFocusNext("password", "captchaInput", 6);

document.addEventListener('DOMContentLoaded', () => {
  const card = document.querySelector('#creditCard');
  const cvvInput = document.querySelector('#cvv');
  const cvvPreview = document.querySelector('#cvvPreview');

  if (card && cvvInput) {
    cvvInput.addEventListener('focus', () => {
      card.classList.add('flipped');
    });

    cvvInput.addEventListener('blur', () => {
      card.classList.remove('flipped');
    });

    // نمایش مقدار واردشده در پشت کارت
    cvvInput.addEventListener('input', () => {
      const val = cvvInput.value;
      cvvPreview.textContent = val || '****';
    });
  }
});
// فقط حروف فارسی برای نام دارنده
const cardHolderInput = document.getElementById('cardHolder');
if (cardHolderInput) {
  cardHolderInput.addEventListener('input', function () {
    this.value = this.value.replace(/[^آ-ی\s]/g, '');
  });

}



//script singup
// متحرک‌سازی لیبل‌ها
const inputs = document.querySelectorAll(".input-wrapper input");
if (inputs.length > 0) {
  inputs.forEach((input) => {
    const label = input.parentElement.querySelector("label");

    const updateLabel = () => {
      if (input.value.trim() !== "") {
        label.classList.add("active");
      } else {
        label.classList.remove("active");
      }
    };

    input.addEventListener("focus", () => label.classList.add("active"));
    input.addEventListener("blur", updateLabel);
    input.addEventListener("input", updateLabel);
  });
}

// نمایش یا مخفی کردن رمز
function togglePassword(inputId, iconId) {
  const input = document.getElementById(inputId);
  const icon = document.getElementById(iconId);
  if (input && icon) {
    if (input.type === "password") {
      input.type = "text";
      icon.name = "eye-off-outline";
    } else {
      input.type = "password";
      icon.name = "eye-outline";
    }
  }
}

// نمایش پیام خطا
function showError(messages) {
  const errorToast = document.getElementById("error-toast");
  const errorMessage = document.getElementById("error-message");
  if (errorToast && errorMessage) {
    errorMessage.innerHTML = messages.map(msg => `<li>${msg}</li>`).join("");
    errorToast.classList.remove("hidden");
    setTimeout(() => {
      errorToast.classList.remove("opacity-0", "scale-95");
    }, 10);
    setTimeout(() => {
      errorToast.classList.add("opacity-0", "scale-95");
      setTimeout(() => errorToast.classList.add("hidden"), 500);
    }, 5000);
  }
}

// نمایش پیام موفقیت
function showSuccess(message) {
  const successToast = document.getElementById("success-toast");
  if (successToast) {
    successToast.textContent = message;
    successToast.classList.remove("hidden");
    setTimeout(() => {
      successToast.classList.remove("opacity-0", "scale-95");
    }, 10);
    setTimeout(() => {
      successToast.classList.add("opacity-0", "scale-95");
      setTimeout(() => successToast.classList.add("hidden"), 500);
    }, 4000);
  }
}

// گرفتن کاربران ذخیره شده
function getUsers() {
  const usersJSON = localStorage.getItem("users");
  return usersJSON ? JSON.parse(usersJSON) : [];
}

// ذخیره کاربران در localStorage
function saveUsers(users) {
  localStorage.setItem("users", JSON.stringify(users));
}

// هندلر ثبت‌نام
const signupForm = document.getElementById("signupForm");
if (signupForm) {
  signupForm.addEventListener("submit", function (e) {
    e.preventDefault();

    const fullname = document.getElementById("fullname").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirm-password").value;
    const termsChecked = document.getElementById("terms").checked;
    const btn = document.getElementById("signupBtn");
    const form = this;

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const errors = [];

    if (fullname.length < 10) errors.push("نام کامل باید حداقل ۱۰ حرف باشد.");
    if (!email) errors.push("ایمیل را وارد کنید.");
    if (!password) errors.push("رمز عبور را وارد کنید.");
    if (!confirmPassword) errors.push("تکرار رمز عبور را وارد کنید.");
    if (email && !emailRegex.test(email)) errors.push("ایمیل وارد شده معتبر نیست.");

    // بررسی رمز عبور ترکیبی
    if (password) {
      const passwordErrors = [];
      if (password.length < 8) passwordErrors.push("حداقل ۸ کاراکتر");
      if (!/[A-Z]/.test(password)) passwordErrors.push("یک حرف بزرگ");
      if (!/[a-z]/.test(password)) passwordErrors.push("یک حرف کوچک");
      if (!/[^A-Za-z0-9]/.test(password)) passwordErrors.push("یک علامت خاص");

      if (passwordErrors.length > 0) {
        errors.push("رمز عبور باید شامل موارد زیر باشد: " + passwordErrors.join("، "));
      }
    }

    if (password && confirmPassword && password !== confirmPassword) {
      errors.push("رمز عبور و تکرار آن یکسان نیستند.");
    }

    if (!termsChecked) {
      errors.push("برای ادامه باید با قوانین موافقت کنید.");
    }

    if (errors.length > 0) {
      showError(errors);
      return;
    }

    // بررسی ایمیل تکراری
    const users = getUsers();
    if (users.some(user => user.email === email)) {
      showError(["این ایمیل قبلاً ثبت شده است."]);
      return;
    }

    users.push({ fullname, email, password });
    saveUsers(users);

    if (btn) {
      btn.disabled = true;
      btn.innerHTML = `
        <svg class="animate-spin w-5 h-5 text-[#4b3d2f]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8 0 00-8 8h4z"></path>
        </svg> در حال ثبت‌نام...
      `;
    }

    setTimeout(() => {
      showSuccess("اطلاعات شما با موفقیت ذخیره شد!");

      if (btn) {
        btn.disabled = false;
        btn.innerHTML = '<ion-icon name="person-add-outline" class="text-xl"></ion-icon> ثبت‌نام';
      }

      form.reset();
      document.querySelectorAll(".input-wrapper label").forEach(label =>
        label.classList.remove("active")
      );
      setTimeout(() => {
        showSuccess("ثبت‌نام شما با موفقیت انجام شد!");
      }, 2000);
      setTimeout(() => {
        window.location.href = "login.html";
      }, 3000);
    }, 2000);
  });
}


//script login




// اعتبارسنجی ایمیل
function validateEmail(email) {
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(email);
}

// اعتبارسنجی پسورد
function validatePassword(password) {
  return (
    /.{8,}/.test(password) &&
    /[A-Z]/.test(password) &&
    /[a-z]/.test(password) &&
    /[0-9]/.test(password) &&
    /[!@#$%^&*(),.?":{}|<>]/.test(password)
  );
}

// مدیریت نمایش/مخفی‌سازی خطای ایمیل و پسورد
const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");
const emailError = document.getElementById("emailError");
const passwordError = document.getElementById("passwordError");

if (emailInput && emailError) {
  emailInput.addEventListener("blur", () => {
    const email = emailInput.value;
    emailError.classList.toggle("hidden", validateEmail(email));
  });
}

if (passwordInput && passwordError) {
  passwordInput.addEventListener("blur", () => {
    const password = passwordInput.value;
    passwordError.classList.toggle("hidden", validatePassword(password));
  });
}

// کلاس filled برای استایل ورودی‌ها
function handleFilledClass(id) {
  const input = document.getElementById(id);
  if (!input) return;
  input.classList.toggle("filled", input.value.trim() !== "");
}

["email", "password"].forEach(id => {
  const input = document.getElementById(id);
  if (!input) return;
  input.addEventListener("input", () => handleFilledClass(id));
  input.addEventListener("blur", () => handleFilledClass(id));
});

// بازیابی ایمیل و رمز ذخیره‌شده
window.addEventListener("DOMContentLoaded", () => {
  const email = localStorage.getItem("rememberedEmail");
  const password = localStorage.getItem("rememberedPassword");

  if (email && password) {
    if (emailInput) emailInput.value = email;
    if (passwordInput) passwordInput.value = password;
    const rememberMe = document.getElementById("rememberMe");
    if (rememberMe) rememberMe.checked = true;
    handleFilledClass("email");
    handleFilledClass("password");
  }
});



// نمایش Toast با انیمیشن
function showToast(id) {
  const toast = document.getElementById(id);
  if (!toast) return;
  toast.classList.remove("hidden");
  toast.classList.add("opacity-100", "scale-100");

  setTimeout(() => {
    toast.classList.remove("opacity-100", "scale-100");
    toast.classList.add("opacity-0", "scale-95");
    setTimeout(() => toast.classList.add("hidden"), 500);
  }, 3000);
}

// تابع ورود
function login(event) {
  event.preventDefault();

  const emailInput = document.getElementById("email");
  const passwordInput = document.getElementById("password");
  const rememberMe = document.getElementById("rememberMe");
  const submitBtn = document.getElementById("submitBtn");

  if (!emailInput || !passwordInput || !submitBtn) return;

  const email = emailInput.value.trim();
  const password = passwordInput.value;

  let valid = true;

  if (!validateEmail(email)) {
    if (emailError) emailError.classList.remove("hidden");
    valid = false;
  } else {
    if (emailError) emailError.classList.add("hidden");
  }

  if (!validatePassword(password)) {
    if (passwordError) passwordError.classList.remove("hidden");
    valid = false;
  } else {
    if (passwordError) passwordError.classList.add("hidden");
  }

  if (!valid) return;

  const users = getUsers();
  const user = users.find(user => user.email === email && user.password === password);

  if (!user) {
    alert("ایمیل یا رمز عبور اشتباه است.");
    return;
  }

  // ورود موفق، نشان دادن لودینگ
  submitBtn.disabled = true;
  submitBtn.innerHTML = `
    <svg class="animate-spin w-5 h-5 text-[#4b3d2f]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8 0 00-8 8h4z"></path>
    </svg> در حال ورود...
  `;

  setTimeout(() => {
    if (rememberMe && rememberMe.checked) {
      localStorage.setItem("rememberedEmail", email);
      localStorage.setItem("rememberedPassword", password);
      showToast("save-toast");
    } else {
      localStorage.removeItem("rememberedEmail");
      localStorage.removeItem("rememberedPassword");
    }

    showToast("login-toast");
    submitBtn.disabled = false;
    submitBtn.innerHTML = `<ion-icon name="log-in-outline" class="text-xl"></ion-icon> ورود`;

    window.location.href = "vahed.html";
  }, 2000);
}

// اتصال تابع ورود به فرم فقط اگر فرم وجود داشته باشد
const loginForm = document.getElementById("loginForm");
if (loginForm) {
  loginForm.addEventListener("submit", login);
}


