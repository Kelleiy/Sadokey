var highlightWord = function (word, clicked)
{
    var _labels = document.getElementsByTagName('LABEL');
    var i = 0;
    var j = _labels.length;
    while (i < j)
    {
        if (_labels[i].title === word)
        {
            if (clicked) {
                _labels[i].className = 'active';
            } 
            else if (_labels[i].className !== 'active')
            {
                _labels[i].className = 'on';
            }
        } 
        else if (_labels[i].className !== 'active')
        {
            _labels[i].className = 'off';
        }
        i++;
    }
};