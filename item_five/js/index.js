document.addEventListener("DOMContentLoaded", function(){

    function populateRegionsOpt(){
        const xhttp = new XMLHttpRequest()
        xhttp.onload = function(){
            arr_data = JSON.parse(this.responseText)
            arr_data.forEach(item => {
                const opt = document.createElement('option')
                opt.id = item.region_code
                opt.value = item.region_code
                opt.innerHTML = item.region_name
                document.getElementById("region").append(opt)
            })
        }
        xhttp.open("GET","./controller/selectoption.controller.php?req_type=regions", true)
        xhttp.send()
    }

    function populateGenderOpt(){
        const xhttp = new XMLHttpRequest()
        xhttp.onload = function(){
            arr_data = JSON.parse(this.responseText)
            arr_data.forEach(item => {
                const opt = document.createElement('option')
                opt.id = item.sex_id
                opt.value = item.sex_id
                opt.innerHTML = item.name
                document.getElementById("gender").append(opt)
            })
        }
        xhttp.open("GET","./controller/selectoption.controller.php?req_type=gender",true)
        xhttp.send()
    }

    // formatting date
    function formatDate(date_str){
        let date = new Date(date_str)
        let day = ("0" + date.getDate()).slice(-2)
        let month = ("0" + (date.getMonth() + 1)).slice(-2)
        return date.getFullYear() + "-" + month + "-" + day
    }
    function formatDate2(date_str){
        let date = new Date(date_str)
        let day = ("0" + date.getDate()).slice(-2)
        let month = ("0" + (date.getMonth() + 1)).slice(-2)
        return day + "/" + month + "/" + date.getFullYear()
    }


    // table reload
    function reloadTable(tbody){
        while(tbody.hasChildNodes()){
            tbody.removeChild(tbody.firstChild)
        }
        populateTable()
    }

    function populateTable(){
        const xhttp = new XMLHttpRequest()
        xhttp.onload = function(){
            arr_data = JSON.parse(this.responseText)
            const table = document.getElementById("row_data")
            arr_data.forEach(item => {

                let row = table.insertRow()
                let lastname = row.insertCell(0)
                let firstname = row.insertCell(1)
                let age = row.insertCell(2)
                let birthdate = row.insertCell(3)
                let gender = row.insertCell(4)
                let region = row.insertCell(5)
                
                row.id = 'row_' + item.id
                lastname.innerHTML = item.lastname
                firstname.innerHTML = item.firstname
                age.innerHTML = item.age
                birthdate.innerHTML = formatDate2(item.birthdate)
                gender.innerHTML = item.gender
                region.innerHTML = item.region

                const editbtn = document.createElement('a')
                editbtn.textContent = "Edit"
                editbtn.className = "btn editbtn"
                editbtn.href = "#"
                editbtn.addEventListener('click',function(e){
                    document.getElementById("lastname").value = item.lastname
                    document.getElementById("firstname").value = item.firstname
                    document.getElementById("birthdate").value = formatDate(item.birthdate)
                    document.getElementById("gender").value = item.sex_id
                    document.getElementById("region").value = item.region_code
                    document.getElementById("volunteerid").value = item.id
                    document.getElementById("action").value ="update"
                    document.getElementById("submitbtn").value ="Update"
                })
                const delbtn = document.createElement('a')
                delbtn.textContent = "Delete"
                delbtn.className = "btn delbtn"
                delbtn.href = "#"
                delbtn.addEventListener('click',function(e){
                    document.getElementById("lastname").value = item.lastname
                    document.getElementById("firstname").value = item.firstname
                    document.getElementById("birthdate").value = formatDate(item.birthdate)
                    document.getElementById("gender").value = item.sex_id
                    document.getElementById("region").value = item.region_code
                    document.getElementById("volunteerid").value = item.id
                    document.getElementById("action").value ="delete"
                    document.getElementById("submitbtn").value ="Delete"
                })
                row.append(editbtn)
                row.append(delbtn)

            })
        }
        xhttp.open("GET","./controller/table.controller.php",true)
        xhttp.send()        
    }

    populateRegionsOpt()
    populateGenderOpt()
    populateTable()


    // Serializer
    function serializeData(form){
        const serializer = {}
        for(let [name, value] of form){
            serializer[name] = value
        }
        //return JSON.stringify(serializer)
        return serializer
    }


    // Submitting form
    document.getElementById("form").addEventListener('submit',function(e){
        e.preventDefault()
        const data = serializeData(new FormData(this))
    
        const params = Object.keys(data).map(function(key){
            return key + "=" + encodeURIComponent(data[key])
        }).join('&')
        const xhttp = new XMLHttpRequest()
    
        xhttp.open("POST","./controller/crud.controller.php",true)

        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhttp.onreadystatechange = () => {
            if(xhttp.readyState === XMLHttpRequest.DONE && xhttp.status === 200){
                const data = JSON.parse(xhttp.responseText)
                
                if(data.message == 'success'){
                    let alert_msg = document.createElement('div')
                    alert_msg.className = "alert alert-success  alert-dismissible fade show"
                    alert_msg.role = "alert"
                    alert_msg.innerHTML = '<strong>Success!</strong> New record added.' +
                                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
            
                    document.getElementById("alertdiv").append(alert_msg)
                }
                if(data.message == 'updated'){
                    let alert_msg = document.createElement('div')
                    alert_msg.className = "alert alert-success alert-dismissible fade show"
                    alert_msg.role = "alert"
                    alert_msg.innerHTML = '<strong>Updated!</strong> record has been updated.' +
                                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
            
                    document.getElementById("alertdiv").append(alert_msg)
                    document.getElementById("form").reset()
                    reloadTable(document.getElementById("row_data"))
                    document.getElementById("action").value ="save"
                    document.getElementById("submitbtn").value ="Save"
                }
                if(data.message == 'deleted'){
                    let alert_msg = document.createElement('div')
                    alert_msg.className = "alert alert-success alert-dismissible fade show"
                    alert_msg.role = "alert"
                    alert_msg.innerHTML = '<strong>Deleted!</strong> record has been deleted.' +
                                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
            
                    document.getElementById("alertdiv").append(alert_msg)
                    document.getElementById("form").reset()
                    reloadTable(document.getElementById("row_data"))
                    document.getElementById("action").value ="save"
                    document.getElementById("submitbtn").value ="Save"
                }
            }
        }
        xhttp.send(params)
    })
})

