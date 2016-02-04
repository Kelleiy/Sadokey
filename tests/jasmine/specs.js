
var fixtureString = "<div id=fix>";
fixtureString += '<label title="abc"></label>';
fixtureString += '<label title="xyz"></label>';
fixtureString += '<label title="uio"></label>';
fixtureString += "</div> ";

describe('hightlightWord', function () {

    beforeEach(function () { // before each test
        $(fixtureString).appendTo('body')
    })
    afterEach(function () {
        $('#fix').remove();
    })
    it('must highlight???', function () {
        console.log($('#fix').html());
        
        highlightWord("abc", true);
        expect($('[title="abc"]').attr('class')).toBe('active');
        expect($('[title="xyz"]').attr('class')).toBe('off');
        expect($('[title="uio"]').attr('class')).toBe('off');
        console.log($('#fix').html());
        
        highlightWord("abc", false);
        expect($('[title="abc"]').attr('class')).toBe('on');
        expect($('[title="xyz"]').attr('class')).toBe('off');
        expect($('[title="uio"]').attr('class')).toBe('off');
        
        console.log($('#fix').html());
        //expect(1).toBe(1);  // at least one test
    });

});
