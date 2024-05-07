
function formatDate(date, onlyDate = false, toDb = false) {
    var d = new Date(date);

    year = d.getFullYear();
    month = '' + (d.getMonth() + 1);
    day = '' + d.getDate();
    hours = '' + d.getHours();
    minutes = '' + d.getMinutes();

    if (minutes.length < 2) { minutes = '0' + minutes; }

    if(onlyDate){
        return [day, month, year].join('.')
    }

    return [day, month, year].join('.') + ' o ' + [hours, minutes].join(':');
}

function areEqualDates(dateToCompare, referenceDate) {
    var toCompare = new Date(dateToCompare);
    var reference = new Date(referenceDate);

    if (toCompare.getFullYear() == reference.getFullYear() &&
        toCompare.getMonth() + 1 == reference.getMonth() + 1 &&
        toCompare.getDate() == reference.getDate()) {
            return true;
    }
    return false;
}