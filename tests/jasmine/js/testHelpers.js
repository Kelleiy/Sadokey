
/**
 * Tel elementen in een object
 * @param {type} obj
 * @returns {Number}
 */
countObj = function (obj) {
    var cnt = 0;
    for (var prop in obj) {
        if (obj.hasOwnProperty(prop))
            cnt++;
    }
    return cnt;
};


// from http://forum.jquery.com/topic/get-element-background-colour-in-jquery
function rgbToHex(rgb) {
    var rgbvals = /rgb[a]?\((.+),(.+),(.+).*\)/i.exec(rgb);
    
    var rval = parseInt(rgbvals[1]);
    var gval = parseInt(rgbvals[2]);
    var bval = parseInt(rgbvals[3]);
    
    return '#' + (
            rval.toString(16) +
            gval.toString(16) +
            bval.toString(16)
            ).toUpperCase();
}