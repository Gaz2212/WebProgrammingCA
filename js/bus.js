window.onload = function() {
    //-------------------------------------------------------------------------
    // define an event listener for the '#createProgrammerForm'
    //-------------------------------------------------------------------------
    var createBusForm = document.getElementById('createBusForm');
    if (createBusForm !== null) {
        createBusForm.addEventListener('submit', validateBusForm);
    }

    function validateBusForm(event) {
        var form = event.target;

        var registration = form['registration'].value;
        var makeModel = form['makeModel'].value;
        var seats = form['seats'].value;
        var engine = form['engine'].value;
        var dateBought = form['dateBought'].value;
        var nextService = form['nextService'].value;
        
        var spanElements = document.getElementsByClassName("error");
        for (var i = 0; i !== spanElements.length; i++) {
            spanElements[i].innerHTML = "";
        }

        var errors = new Object();

        if (registration === "") {
            errors["registration"] = "registration cannot be empty\n";
        }
        if (makeModel === "") {
            errors["makeModel"] = "makeModel cannot be empty\n";
        }
        if (seats === "") {
            errors["seats"] = "seats cannot be empty\n";
        }

        if (engine === "") {
            errors["engine"] = "engine cannot be empty\n";
        }
        if (dateBought === "") {
            errors["dateBought"] = "datebought cannot be empty";
        }
        if (nextService === "") {
            errors["nextService"] = "nextService cannot be empty\n";
        }

        var valid = true;
        for (var index in errors) {
            valid = false;
            var errorMessage = errors[index];
            var spanElement = document.getElementById(index + "Error");

            spanElement.innerHTML = errorMessage;

        }
        
        if (!valid) {
            event.preventDefault();
        }
        else if (!confirm("Save ?")) {
            event.preventDefault();
        }
    }

    //-------------------------------------------------------------------------
    // define an event listener for the '#createProgrammerForm'
    //-------------------------------------------------------------------------
    var editBusForm = document.getElementById('editBusForm');
    if (editBusForm !== null) {
        editBusForm.addEventListener('submit', validateBusForm);
    }

    //-------------------------------------------------------------------------
    // define an event listener for any '.deleteProgrammer' links
    //-------------------------------------------------------------------------
    var deleteLinks = document.getElementsByClassName('deleteBus');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }

    function deleteLink(event) {
        if (!confirm("Are you sure you want to delete this bus?")) {
            event.preventDefault();
        }
    }

};