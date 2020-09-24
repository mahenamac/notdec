const THISDAY = new Date();
const THISMONTH = THISDAY.getMonth();
const THISYEAR = THISDAY.getFullYear();
const GET_DAY_NAME = (dt)=>{
    const DAYS = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    return DAYS[dt.getDay()];
};

const GET_MONTH_NAME = (dt)=>{
    const MONTHS = [ 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ];
    return MONTHS[dt.getMonth()];
};

let FIELD_IDS = [];
let ERROR_COUNT = 0;
let viewButtons = editButtons = deleteButtons = '';

const capitalize = (s) => {
    if (typeof s !== 'string') return ''
    return s.charAt(0).toUpperCase() + s.slice(1)
}

//Children
try{

    document.getElementById('process_child').addEventListener('click', e =>{
        e.preventDefault();
        FIELD_IDS = ['admission_number','child_name','admission_date']
        let validateForm = UIValidate(FIELD_IDS,ERROR_COUNT);

        if( validateForm === 0 ){
            document.getElementById('info_page').style.display = 'block';
            document.getElementById('process_info').style.display = 'block';
            document.getElementById('back_to_child').style.display = 'block';
            document.getElementById('child_page').style.display = 'none';
            document.getElementById('process_child').style.display = 'none';
        }
        else{
            console.log(validateForm)
        }
    });

    document.getElementById('process_info').addEventListener('click', e =>{
        e.preventDefault();
        if(document.getElementById('abandoned').value == 'Yes'){
            FIELD_IDS = ['abandoned','village','parish','district','circumstances','admission_reason','health_condtition','duration','duration_type']
        }else{
            FIELD_IDS = ['abandoned','circumstances','admission_reason','health_condtition','duration','duration_type']
        }

        let validateForm = UIValidate(FIELD_IDS,ERROR_COUNT);

        if( validateForm === 0 ){
            document.getElementById('guardian_page').style.display = 'block';
            document.getElementById('back_to_info').style.display = 'block';
            document.getElementById('save_child').style.display = 'block';
            document.getElementById('back_to_child').style.display = 'none';
            document.getElementById('process_child').style.display = 'none';
            document.getElementById('info_page').style.display = 'none';
            document.getElementById('process_info').style.display = 'none';
        }
        else{
            console.log(validateForm)
        }

    });
    document.getElementById('process_guardian').addEventListener('click', e =>{
        e.preventDefault();
        FIELD_IDS = ['admission_number','child_name','admission_date']
        let validateForm = UIValidate(FIELD_IDS,ERROR_COUNT);

        if( validateForm === 0 ){
            document.getElementById('guardian_page').style.display = 'block';
            document.getElementById('process_child').style.display = 'block';
            document.getElementById('back_to_info').style.display = 'block';
            document.getElementById('child_page').style.display = 'none';
            document.getElementById('info_page').style.display = 'none';
            document.getElementById('process_child').style.display = 'none';
        }
        else{
            console.log(validateForm)
        }

    });

    document.getElementById('back_to_child').addEventListener('click', e => {
        e.preventDefault();
        document.getElementById('child_page').style.display = 'block';
        document.getElementById('process_child').style.display = 'block';
        document.getElementById('process_info').style.display = 'none';
        document.getElementById('guardian_page').style.display = 'none';
        document.getElementById('info_page').style.display = 'none';
        document.getElementById('save_child').style.display = 'none';
        document.getElementById('back_to_child').style.display = 'none';
    });

    document.getElementById('back_to_info').addEventListener('click', e => {
        e.preventDefault();
        document.getElementById('info_page').style.display = 'block';
        document.getElementById('process_info').style.display = 'block';
        document.getElementById('guardian_page').style.display = 'none';
        document.getElementById('save_child').style.display = 'none';
        document.getElementById('back_to_child').style.display = 'block';
        document.getElementById('back_to_info').style.display = 'none';
    });

    document.getElementById('childForm').addEventListener('submit', function(e){
        e.preventDefault();
        let CHILD_INDEX = document.getElementById('child_id');
        let CHILD_ID = (CHILD_INDEX === null)? null:CHILD_INDEX.value;
        if( CHILD_ID !== null && CHILD_ID != ''){
            console.log('Update')
            FIELD_IDS = ['admission_number','child_name','child_gender','birth_date','birth_order','clan','religion','totem','admission_date','mother','mother_alive','mother_phone','father','father_alive','father_phone']
            let validateForm = UIValidate(FIELD_IDS,ERROR_COUNT);
            if( validateForm === 0 ){
                let formData = new FormData(this);
                    axios.post(`/children/${CHILD_ID}`,formData,{
                        method:'PUT'
                    })
                    .then( response => {
                        $('#childForm')[0].reset();
                        $('#addChild').modal('hide');
                        location.reload();
                        showAlert('success',response.data);
                    } )
                    .catch( error => backendValidation(error.response.data.errors) );

            }
            else{

                FIELD_IDS = ['guardian_name','guardian_child','guardian_address','relationship','council_name','council_address'];
                let validateForm = UIValidate(FIELD_IDS,ERROR_COUNT);
                if( validateForm === 0 ){
                    let formData = new FormData(this);
                    axios.post('/children',formData)
                .then( response => {
                    $('#childForm')[0].reset();
                    $('#addChild').modal('hide');
                    location.reload();
                    showAlert('success',response.data);
                })
                .catch( error => backendValidation(error.response.data.errors) );
            }else{

            }
        }
    }
    });


        //Edit child
        document.querySelectorAll('.editChild').forEach(element =>{
            element.addEventListener('click', e =>{
                axios.get(`/children/${e.target.id}/edit`)
                .then( response => {
                    data = response.data;
                    document.getElementById('child_id').value = data.id;
                    document.getElementById('admission_number').value = data.admission_number;
                    document.getElementById('child_name').value = data.name;
                    document.getElementById('child_gender').value = data.gender;
                    document.getElementById('birth_date').value = data.birthdate;
                    document.getElementById('birth_order').value = data.birth_order;
                    document.getElementById('clan').value = data.clan;
                    document.getElementById('religion').value = data.religion;
                    document.getElementById('religion').value = data.religion;
                    document.getElementById('totem').value = data.totem;
                    document.getElementById('admission_date').value = data.admission_date;
                    document.getElementById('mother').value = data.mother;
                    document.getElementById('mother_alive').value = data.mother_alive;
                    document.getElementById('mother_phone').value = data.mother_phone;
                    document.getElementById('father').value = data.father;
                    document.getElementById('father_alive').value = data.father_alive;
                    document.getElementById('father_phone').value = data.father_phone;
                    document.getElementById('child_title').innerText = `Update Child`;
                    document.getElementById('process_child').innerText = `Update`;
                    document.getElementById('process_child').style.display = 'none';
                    document.getElementById('process_info').style.display = 'none';
                    document.getElementById('update_child').style.display = 'block';
                    document.getElementById('save_child').style.display = 'none';
                    document.getElementById('back_to_child').style.display = 'none';
                    $('#addChild').modal('show');
                })
                .catch( error => console.log(error) );
            });
        });
}
catch(err){

}

try{
    document.querySelector('.custom-file-input').addEventListener('change',function(e){
        let fileName = document.getElementById("picture").files[0].name;
        let nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
      })

    document.querySelector('.text').addEventListener('click', function(e){
        e.preventDefault();
        let target_id = e.target.id;
        document.getElementById('the_child_id').value = target_id;
        $('#changePicture').modal('show');
    })

    document.getElementById('picturesForm').addEventListener('submit', function(e){
        e.preventDefault();
        FIELD_IDS = ['picture']
        let validateForm = UIValidate(FIELD_IDS,ERROR_COUNT);
        if( validateForm === 0 ){
            let formData = new FormData(this);
            axios.post('/pictures',formData)
            .then( response =>{
                showAlert('success',response.data);
                location.reload();
            })
            .catch( error => backendValidation(error.response.data.errors) );
        }
    })
}
catch(err){

}

try{

}
catch(err){

}

try{
    //Add users
    document.getElementById('userForm').addEventListener('submit', function(e){
        e.preventDefault();
        const USER_INDEX = document.getElementById('user_id');
        const USER_ID = (USER_INDEX == null)? null:USER_INDEX.value;
        FIELD_IDS = USER_INDEX== null? ['staff_id','firstname','lastname','user_gender','mobile_phone','email','password','password-confirm','the_department','the_title','level','userStatus']:['staff_id','firstname','lastname','user_gender','mobile_phone','email','the_department','the_title','the_level','account_status'];
        let validateForm = UIValidate(FIELD_IDS,ERROR_COUNT);
        if( validateForm === 0 ){
            let formData = new FormData(this);
            if( USER_ID !== null && USER_ID.length > 0){
                axios.post(`/users/${USER_ID}`,formData,{
                    method: 'PUT'
                })
                .then( response => {
                    $('#departmentsForm')[0].reset();
                    $('#addDepartments').modal('hide');
                    showAlert('success',response.data);
                    location.reload()
                } )
                .catch( error =>backendValidation(error.response.data.errors));
            }
            else{
                axios.post('/users',formData)
                .then( response =>{
                    showAlert('success',response.data);
                    location.reload();
                })
                .catch( error => backendValidation(error.response.data.errors) );
            }
        }
    });
}
catch(err){

}


try{
    document.getElementById('feedBackForm').addEventListener('submit',function(e){
        e.preventDefault()
        FIELD_IDS = ['subject','message_body'];
        let validateForm = UIValidate(FIELD_IDS,ERROR_COUNT);
        if( validateForm === 0 ){
            let formData = new FormData(this);
            axios.post('/support',formData)
            .then( response => {
                $('#feedBackForm')[0].reset();
                showAlert('success',response.data);
                location.reload();
            } )
            .catch( error => backendValidation(error.response.data.errors) );
        }
        else{
            console.log(validateForm)
        }
    })
}
catch(e){

}

let exportExcel = (tableId, filename= null)=>{
    let downloadLink;
    let dataType = 'application/vnd.ms-excel';
    let tableSelect = document.getElementById(tableId);
    let tableHTML = tableSelect.outerHTML.replace(/ /g, '%20')
    filename = filename?filename+'.xls':'AH_Consulting.xls';
    downloadLink = document.createElement("a");
    document.body.appendChild(downloadLink);
    if(navigator.msSaveOrOpenBlob){
        let blob = new Blob(['\ufeff',tableHTML],{
            type: dataType
        });
        navigator.msSaveOrOpenBlob(blob,filename);
    }else{
        downloadLink.href = 'data:' +dataType+','+tableHTML;
        downloadLink.download = filename;
        downloadLink.click();
    }
  }

let assignUser = (form,url) => {
    FIELD_IDS = ['the_user_id'];
    let validateForm = UIValidate(FIELD_IDS,ERROR_COUNT);
    if( validateForm === 0 ){
        let formData = new FormData(form);
        axios.post(url,formData)
        .then( response => {
            $('#consultantForm')[0].reset();
            $('#addConsultant').modal('hide');
            showAlert('success',response.data);
            location.reload();
        })
        .catch( error => backendValidation(error.response.data.errors) );
    }
    else{
        console.log('Validation error')
    }
}

let confirmDelete = (id,item) =>{

    document.getElementById('warningMessage').innerHTML = `Are you sure you want to delete this?<input type="hidden" id="item-delete" value="${id}" data-record="${item}">`;
    $('#warn').modal('show');
}

let deleteItem = (url) =>{
    axios.delete(url)
    .then(response => {
        showAlert('success',response.data);
        location.reload();
    })
    .catch( error => backendValidation(error.response.data.errors) );
}

let elementAdd = (parentID, position, element ) => {
    const PARENT = document.getElementById( parentID )
    if (PARENT !== null ) PARENT.insertAdjacentHTML(position, element)
}

let elementRemove = elementID => {
    const ELEMENT = document.getElementById( elementID )
    if( ELEMENT !== null ) ELEMENT.parentNode.removeChild( ELEMENT )
}

let markerAttach = elementID => {
    const ELEMENT = document.getElementById(elementID)
    if( ELEMENT !== null ) ELEMENT.classList.add('error-marker')
}

let markerDetach = elementID => {
    const ELEMENT = document.getElementById(elementID)
    if( ELEMENT !== null ) ELEMENT.classList.remove('error-marker')
}

let calculateResults = (url,formId,exportBtn) =>{
    let formData = new FormData(formId);
    for(let i = 0; i < FIELD_IDS.length; i++ ) {
        formData.append(document.getElementById( FIELD_IDS[i] ).name, document.getElementById( FIELD_IDS[i] ).value);
    }
    axios.post(`/${url}`,formData)
    .then( response => {
        data = response.data
        recordsHTML = '';
        if( data != '') {
            recordsHTML += `<table id="sorted_opportunities" class="table table-bordered table-sm">
            <thead class="bg-success text-white"><tr><td>OM Number</td><td>Name</td><td>Type</td><td>Stage</td><td>Country</td><td>Revenue</td></tr></thead><tbody>`
            for(let i=0; i<data.length; i++){
                recordsHTML += `<tr><td>
                <a href="/opportunities/${data[i].id}" class="text-primary" title="View Opportunity">${data[i].om_number}</a></td><td>${data[i].name}</td><td>${data[i].type}</td><td>${data[i].sales_stage}</td><td>${data[i].country}</td><td>${data[i].revenue}</td></tr>`
            }
            recordsHTML += `<tbody></table>`;
            document.getElementById('summaries').innerHTML = `Total records - ${data.length}`;
            elementAdd( 'records-list', 'beforeend', recordsHTML );
            document.getElementById(exportBtn).style.display = 'block';
        }
        else {
            document.getElementById('summaries').innerText = `No records found`;
            document.getElementById(exportBtn).style.display = 'none';
        }
        document.getElementById('records-list').style.display = 'block';
        document.getElementById('loading').style.display = 'none';

    })
    .catch( error => {
        backendValidation(error.response.data.errors)
    });
}

let openConsultation = (workstation,id) => {
    document.getElementById(workstation).value = id;
    $('#addConsultant').modal('show');
}

let getDocument = (e) => {
    document.getElementById('owner_id').setAttribute('name', e.target.dataset.owner);
    document.getElementById('owner_id').value = e.target.dataset.id;
    document.getElementById('fileName').setAttribute('name', 'fileName');
    document.getElementById('fileName').value = e.target.dataset.name;
    $('#addDocument').modal('show');
}

let backendValidation = response => {

    Object.keys(response).forEach( item => {

        const itemDom = document.getElementById(item);
        const errorMessage = response[item];
        const errorMessages = document.querySelectorAll('.text-danger');
        errorMessages.forEach((Element)=>Element.textContent = '');
        const formControls = document.querySelectorAll('.form-control');
        formControls.forEach((Element) =>Element.classList.remove('border', 'border-danger'));
        itemDom.classList.add('border', 'border-danger');
        itemDom.insertAdjacentHTML('afterend',`<div class="text-danger">${errorMessage}</div>`);

    });

    return false;
}

let UIValidate = (FIELD_IDS,ERROR_COUNT) =>{

    for(let i = 0; i < FIELD_IDS.length; i++ ) {

        elementRemove(`error-${FIELD_IDS[i]}`)

        if( document.getElementById( FIELD_IDS[i] ) !== null &&  document.getElementById( FIELD_IDS[i] ).value == '' ) {
            ERROR_COUNT++
            elementAdd(FIELD_IDS[i],'afterend',`<p id="error-${FIELD_IDS[i]}" class="text-danger">Required!</p>`);
            markerAttach(FIELD_IDS[i]);


        } else {

            elementRemove( `error-${FIELD_IDS[i]}` )
            markerDetach( FIELD_IDS[i] )
        }
    }
    return ERROR_COUNT
}

let  toArray = obj =>{
    let array = [];
    for (let i = obj.length >>> 0; i--;) {
      array[i] = obj[i];
    }
    return array;
}

let validateDynamic = (FIELDS,ERROR_COUNT) =>{

    for(let i = 0; i < FIELDS.length; i++ ) {

        elementRemove(`error-${FIELDS[i]}`)

        if( document.getElementById( FIELDS[i] ) !== null &&  document.getElementById( FIELDS[i] ).value == '' ) {
            ERROR_COUNT++
            elementAdd(FIELDS[i],'afterend',`<p id="error-${FIELDS[i]}" class="text-danger">Required!</p>`);
            markerAttach(FIELDS[i]);


        } else {

            elementRemove( `error-${FIELDS[i]}` )
            markerDetach( FIELDS[i] )
        }
    }
    return ERROR_COUNT
}

let showTaskDetails = (e) =>{
    if(e.target.classList.contains('taskDetail')){
    console.log(e.target.parentNode.parentNode.siblings)
    }
}

let doEvaluation = (id,modal) =>{
    document.getElementById('evaluationable_id').value = id;
    document.getElementById('evaluationable_type').value = `App\\${modal}`;
    document.getElementById('evaluation_title').innerText = `${modal} Evaluation`;
    $('#addEvaluations').modal('show');
};

let saveEvaluation = (formId) =>{
    FIELD_IDS = ['evaluationForm','results_achieved','challenges_faced','improvement_plans'];
       let validateForm = UIValidate(FIELD_IDS,ERROR_COUNT);
    if( validateForm === 0 ){
        let formData = new FormData(formId);
        axios.post('/evaluations',formData)
        .then( response => {
            $('#evaluationForm')[0].reset();
            $('#addEvaluations').modal('hide');
            location.reload();
            showAlert('success',response.data);
        })
        .catch( error => backendValidation(error.response.data.errors) );
    }
}

let removeRow = (id) =>{
    document.getElementById(`row${id}`).remove();
}

let clearAlert = () =>{
    let currentAlert = document.querySelector('.alert');
    if(currentAlert){
        currentAlert.remove()
    }
}

let showAlert = (cls, msgInfo) =>{
    clearAlert();
    let className = (cls == 'error')? 'alert alert-danger':'alert alert-success';
    let div = document.createElement('div');
    div.className =className;
    div.appendChild(document.createTextNode(msgInfo));
    let notices = document.getElementById('notices');
    let noticesPoint = document.getElementById('noticesPoint');
    notices.insertBefore(div,noticesPoint);
    //Alert timeout
    setTimeout(()=>{
        clearAlert();
    },4000)
}

let previewContent = (el) =>{
    let restorePage = document.body.innerHTML;
    let printContent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printContent;
    window.print()
    document.body.innerHTML = restorePage;
}

let assignTask = id =>{
    let patch ='';
    let consultantsList = document.querySelectorAll('.responsible_users');
    consultantsList = Array.from(consultantsList)
    if(consultantsList.length == 0){
        showAlert('error','There are no consultants for this task');
        return false;
    }else{
        consultantsList.forEach(consultant => {
            patch += `<option value="${consultant.id}">${consultant.textContent}</option>`;
        });
    }

    //Get Associates
    let associatesList = document.querySelectorAll('.associates');
    associatesList = Array.from(associatesList)
    associatesList.forEach(associate => {
        patch += `<option value="${associate.id}">${associate.textContent}</option>`;
    });

    document.getElementById('taskStaff').innerHTML = patch;
    document.getElementById('the_deliverable').value = id;
    $('#addTask').modal('show');

}

let saveTask = (FIELD_IDS) =>{
    const TASK_INDEX = document.getElementById('task_id');
    const TASK_ID = (TASK_INDEX == null)? null:TASK_INDEX.value;
    let validateForm = UIValidate(FIELD_IDS,ERROR_COUNT);
    if( validateForm === 0 ){
        let formData = new FormData(document.getElementById('taskForm'));
        if( TASK_ID !== null && TASK_ID.length > 0){
            axios.post(`/tasks/${TASK_ID}`,formData,{
                method: 'PUT'
            })
            .then( response => {
                $('#taskForm')[0].reset();
                $('#addTask').modal('hide');
                showAlert('success',response.data);
                location.reload();
            } )
            .catch( error => backendValidation(error.response.data.errors) );
        }
        else{
            axios.post('/tasks',formData)
            .then( response => {
                $('#taskForm')[0].reset();
                $('#addTask').modal('hide');
                showAlert('success',response.data);
                location.reload();
            })
            .catch( error => backendValidation(error.response.data.errors) );

        }
    }else{
        console.log(validateForm)
    }
}

let createComment = (id,modal) =>{

    document.getElementById('commentable_id').value = id;
    document.getElementById('commentable_type').value = `App\\${modal}`;
    document.getElementById('comment_title').innerText = `${modal} Comments`;
    $('#addComments').modal('show');

}

let saveComment = (formId) =>{
    const COMMENT_INDEX = document.getElementById('comment_id');
    const COMMENT_ID = (COMMENT_INDEX == null)? null:COMMENT_INDEX.value;
    FIELD_IDS = ['comment_body','commentable_type','commentable_id'];
    let validateForm = UIValidate(FIELD_IDS,ERROR_COUNT);
    if( validateForm === 0 ){
        let formData = new FormData(formId);
        if( COMMENT_ID !== null && COMMENT_ID.length > 0){
            axios.post(`/comments/${COMMENT_ID}`,formData,{
                method: 'PUT'
            })
            .then( response => {
                $('#commentsForm')[0].reset();
                $('#addComments').modal('hide');
                showAlert('success',response.data);
                location.reload();
            } )
            .catch( error => backendValidation(error.response.data.errors) );
        }
        else{
            axios.post('/comments',formData)
            .then( response => {
                $('#commentsForm')[0].reset()
                $('#addComments').modal('hide')
                showAlert('success',response.data);
                location.reload();
            })
            .catch( error => backendValidation(error.response.data.errors) );
        }
    }
}
