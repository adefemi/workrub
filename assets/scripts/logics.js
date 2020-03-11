const BASE_API = "http://localhost:1337";
const CONTACT_FORM_URL = BASE_API + "/contact-forms";
const APPLICATION_FORM_URL = BASE_API + "/applications";
const BOOKING_FORM_URL = BASE_API + "/bookings";
const FUNCTION_TIMESLOT = BASE_API + "/function-timeslots";
const FUNCTION_ALLOCATION = BASE_API + "/function-allocations";
const BLOG_COMMENT = BASE_API + "/blog-comments";
let notifierTimeOut = null;

(() => {
  // logics for nav-drawal toggling
  $("#nav-icon2").click(function() {
    $(this).addClass("open");
    $("#drawer").addClass("open");
  });
  $("#overlay-toggle").click(function() {
    $("#drawer").removeClass("open");
    $("#nav-icon2").removeClass("open");
  });

  $("#notifier-close").click(() => {
    $("#notifier").toggleClass("show");
    clearTimeout(notifierTimeOut);
  });

  //contact submit
  $("#contact-form").submit(function(e) {
    e.preventDefault();
    const formMain = $(this);
    const notifier = $("#notifier");
    const notifierText = $("#notifier-text");
    var data = {};
    var arrayData = $(this).serializeArray();
    var submit_btn = $("#contact-submit");
    for (var i = 0; i < arrayData.length; i++) {
      data[arrayData[i].name] = arrayData[i].value;
    }
    submit_btn.addClass("load");
    var text = submit_btn.find(".btn-text")[0];
    const defaultText = $(text).text();
    $(text).text($(text).text() + "ing");
    $.post(CONTACT_FORM_URL, data).then(
      res => {
        notifierText.text("Message sent successfully");
        notifier.addClass("success show");
        removeWithTime(notifier, "show");
        $(text).text(defaultText);
        submit_btn.removeClass("load");
        formMain[0].reset();
      },
      error => {
        notifierText.text("An error occur while sending message");
        notifier.addClass("error show");
        removeWithTime(notifier, "show");
        $(text).text(defaultText);
        submit_btn.removeClass("load");
      }
    );
  });

  $("#comment-form").submit(function(e) {
    e.preventDefault();
    const formMain = $(this);
    const notifier = $("#notifier");
    const notifierText = $("#notifier-text");
    var data = {};
    var arrayData = $(this).serializeArray();
    var submit_btn = $("#comment-submit");
    for (var i = 0; i < arrayData.length; i++) {
      data[arrayData[i].name] = arrayData[i].value;
    }
    submit_btn.addClass("load");
    var text = submit_btn.find(".btn-text")[0];
    const defaultText = $(text).text();
    $(text).text("posting");
    $.post(BLOG_COMMENT, data).then(
      res => {
        notifierText.text("Comment posted successfully");
        notifier.addClass("success show");
        removeWithTime(notifier, "show");
        $(text).text(defaultText);
        submit_btn.removeClass("load");
        formMain[0].reset();
        setTimeout(() => window.location.reload(), 500);
      },
      error => {
        notifierText.text("An error occur while sending message");
        notifier.addClass("error show");
        removeWithTime(notifier, "show");
        $(text).text(defaultText);
        submit_btn.removeClass("load");
      }
    );
  });

  $("#application-form").submit(function(e) {
    e.preventDefault();
    const formMain = $(this);
    const notifier = $("#notifier");
    const notifierText = $("#notifier-text");
    var submit_btn = $("#application-submit");
    const appData = new FormData();
    const formElements = formMain[0].elements;
    const data = {};

    for (let i = 0; i < formElements.length; i++) {
      const currentElement = formElements[i];
      if (!["submit", "file"].includes(currentElement.type)) {
        data[currentElement.name] = currentElement.value;
      } else if (currentElement.type === "file") {
        if (currentElement.files.length === 1) {
          const file = currentElement.files[0];
          appData.append(`files.${currentElement.name}`, file, file.name);
        } else {
          for (let i = 0; i < currentElement.files.length; i++) {
            const file = currentElement.files[i];

            appData.append(`files.${currentElement.name}`, file, file.name);
          }
        }
      }
    }
    appData.append("data", JSON.stringify(data));
    submit_btn.addClass("load");
    var text = submit_btn.find(".btn-text")[0];
    const defaultText = $(text).text();
    $(text).text("Submitting");

    axios.post(APPLICATION_FORM_URL, appData).then(
      res => {
        notifierText.text("Application submitted successfully");
        notifier.addClass("success show");
        removeWithTime(notifier, "show");
        $(text).text(defaultText);
        submit_btn.removeClass("load");
        formMain[0].reset();
      },
      error => {
        // console.log(error.message);
        notifierText.text("An error occur while sending message");
        notifier.addClass("error show");
        removeWithTime(notifier, "show");
        $(text).text(defaultText);
        submit_btn.removeClass("load");
      }
    );
  });

  $("#book-next").click(function() {
    const conForm = $("#book-info");
    const datePicker = $("#datePick");
    conForm.removeClass("hidden");
    datePicker.addClass("hidden");
    $(this).addClass("hidden");
    $("#book-now").removeClass("hidden");
    $("#edit-time").removeClass("hidden");
  });

  $("#edit-time").click(function() {
    const conForm = $("#book-info");
    const datePicker = $("#datePick");
    conForm.addClass("hidden");
    datePicker.removeClass("hidden");
    $(this).addClass("hidden");
    $("#book-now").addClass("hidden");
    $("#book-next").removeClass("hidden");
  });

  $("#book-form").submit(function(e) {
    e.preventDefault();
    const formMain = $(this);
    const notifier = $("#notifier");
    const notifierText = $("#notifier-text");
    var data = {};
    var arrayData = $(this).serializeArray();
    var submit_btn = $("#book-now");
    for (var i = 0; i < arrayData.length; i++) {
      data[arrayData[i].name] = arrayData[i].value;
    }
    data.time = selectedTime + ",   " + selectedSlot;
    submit_btn.addClass("load");
    var text = submit_btn.find(".btn-text")[0];
    const defaultText = $(text).text();
    $(text).text("Booking");

    axios.post(FUNCTION_ALLOCATION, {
      date: selectedTime,
      function_content: activeFunctionContent,
      function_timeslot: selectedSlotId
    });

    $.post(BOOKING_FORM_URL, data).then(
      res => {
        notifierText.text("Booking made successfully");
        notifier.addClass("success show");
        removeWithTime(notifier, "show");
        $(text).text(defaultText);
        submit_btn.removeClass("load");
        formMain[0].reset();
      },
      error => {
        notifierText.text("An error occur while making booking");
        notifier.addClass("error show");
        removeWithTime(notifier, "show");
        $(text).text(defaultText);
        submit_btn.removeClass("load");
      }
    );
  });

  $("#showPolicy").click(function() {
    $(this).toggleClass("show-drop");
    $("#canpol").toggleClass("hidden2");
  });

  // load content
  let content = $("#term-content");
  let md = window.markdownit();
  let result = md.render(content.text());
  content.html(result);

  // load content
  let p_content = $("#privacy-content");
  let p_md = window.markdownit();
  let p_result = p_md.render(p_content.text());
  p_content.html(p_result);

  // load about content
  let a_content = $("#about-content");
  let a_md = window.markdownit();
  let a_result = a_md.render(a_content.text());
  a_content.html(a_result);

  $("#send_brief").click(function(e) {
    e.preventDefault();
    let hash = this.hash;
    $("html, body").animate(
      {
        scrollTop: $(hash).offset().top
      },
      800,
      function() {
        window.location.hash = "";
      }
    );
  });
})();

function toggler(id) {
  $(".dropdown" + id).toggleClass("open");
}

function removeWithTime(content, class_name) {
  notifierTimeOut = setTimeout(() => {
    content.removeClass(class_name);
  }, 5000);
}

function faqToggle(e) {
  let faqList = $(".faq-con");
  for (let i = 0; i < faqList.length; i++) {
    if (faqList[i] === e) {
      continue;
    }
    let tempAns = $(faqList[i]).find(".faq-ans");
    let tempArrow = $(faqList[i]).find(".drop-faq");
    if (!tempAns.hasClass("hidden")) {
      tempAns.addClass("hidden");
    }
    if (tempArrow.hasClass("open")) {
      tempArrow.removeClass("open");
    }
  }
  let ansEl = $(e).find(".faq-ans");
  let arrowEl = $(e).find(".drop-faq");
  ansEl.toggleClass("hidden");
  arrowEl.toggleClass("open");
}
