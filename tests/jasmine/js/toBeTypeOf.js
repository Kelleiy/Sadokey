// https://gist.github.com/adamyanalunas/3925377

jasmine.Matchers.prototype.hasProperty = function (expected) {
    var actual, notText, objType;
    actual = this.actual;
    notText = this.isNot ? 'has not the' : '';   
    this.message = function() {
        return 'Expected ' + actual + notText + ' property ' + expected;
    }
    return actual.hasOwnProperty(expected);
}
jasmine.Matchers.prototype.toBeTypeOf = function (expected) {
    var actual, notText, objType;
    actual = this.actual;
    for (var key in actual) {
        //console.log('key: ' + key + '\n' + 'value: ' + actual[key]);
    }
    console.log(actual.bord);


    notText = this.isNot ? 'not ' : '';
    objType = actual ? Object.prototype.toString.call(actual) : '';
    console.log("toBeT", actual);
    this.message = function () {
        return 'Expected ' + actual + notText + ' to be an array';
    }

    return objType.toLowerCase() === '[object ' + expected.toLowerCase() + ']';
}