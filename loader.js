const cssLink = document.createElement("link");
cssLink.rel = "stylesheet";
cssLink.href = "style.css?v=" + new Date().getTime(); // جلوگیری از کش شدن
document.head.appendChild(cssLink);
