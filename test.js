function slide (id, offsetX) {
    var slider = document.querySelector(id);
    var rect = slider.getBoundingClientRect(),
        x0 = rect.x || rect.left,
        y0 = rect.y || rect.top,
        x1 = x0 + offsetX,
        y1 = y0;
    var mousedown = document.createEvent('MouseEvents');
    mousedown.initMouseEvent('mousedown', true, true, window, 0, x0, y0, x0, y0, false, false, false, false, 0, null);
    slider.dispatchEvent(mousedown);

    var mousemove = document.createEvent('MouseEvents');
    mousemove.initMouseEvent('mousemove', true, true, window, 0, x1, y1, x1, y1, false, false, false, false, 0, null);
    slider.dispatchEvent(mousemove);

    setTimeout(() => {
        var mouseup = document.createEvent('MouseEvents');
        mouseup.initMouseEvent('mouseup', true, true, window, 0, x1, y1, x1, y1, false, false, false, false, 0, null);
        slider.dispatchEvent(mouseup);
    },1000)

}
slide('.geetest_slider_button', 125)


