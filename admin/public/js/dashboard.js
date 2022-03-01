const links = document.querySelectorAll('a')
const editProfileForm = document.querySelector('.edit')

const membersIdData = Array.from(document.querySelectorAll('table td.id'))
const editMemberBtn = document.querySelectorAll('.edit-member')
const deleteMemberBtn = document.querySelectorAll('.delete-member')
const activateMemberBtn = document.querySelectorAll('.activate-member')
const addMemberBtn = document.querySelector('.add-member')

const addMemberForm = document.querySelector('.add')
const table = document.querySelector('table')

const addCategoryBtn = document.querySelector('.add-category-btn')
const saveCategoryBtn = document.querySelector('.save-category-btn')
const addCategoryForm = document.querySelector('.add-category')
const addCategoryFormType = document.querySelector('.category-form-type')
const allCategories = document.querySelectorAll('.category')
const CategoryManage = document.querySelector('.category-wrapper')

links.forEach(link=>{
    const urlArr = location.href.split('/')

    if(!link.classList.contains('dropdown-toggle')){
        link.addEventListener('click',e=>{
            const URL = location.href

            const lastChar = urlArr[urlArr.length - 1] 
            if(lastChar=== 'edit' || typeof Number(lastChar) === 'number'){
                e.preventDefault()

                const linkText = e.target.href.split('/')[urlArr.length - 1] 
                location.href = '/shop/admin/pages/' + linkText
            }

            if(URL.includes(e.target.href)){
                e.preventDefault()
                location.reload()
            }
        })
    }

})


if(editProfileForm){
    const btn = document.querySelector('.edit-btn')
    btn.addEventListener('click',e=>{
        e.preventDefault()
        const URL = location.href
        fetch(URL,{
            method : 'POST',
            body : new FormData(editProfileForm)
        })
        .then(res=>res.json())
        .then(data=>{
            if(data.status == 'ok'){
                location.href = '/shop/admin/pages/dashboard'
            }
        })
    })
}

if(addMemberForm){
    const btn = document.querySelector('.add-btn')

    btn.addEventListener('click',e=>{
        e.preventDefault()
        const URL = location.href
        fetch(URL,{
            method : 'POST',
            body : new FormData(addMemberForm)
        })
        .then(res=>res.json())
        .then(data=>{
            if(data.status == 'ok'){
                location.href = '/shop/admin/pages/dashboard'
            }
        })
    })
}




const URLMembers = '/shop/admin/pages/members';

if(membersIdData.length > 0){
    deleteMemberBtn.forEach((btn,index)=>{
        btn.addEventListener('click',()=>{
            fetch(`${URLMembers}?action=delete&id=${membersIdData[index].textContent}`)
            .then(res=>res.json())
            .then(data=>{
                if(data.status == 'ok'){
                    membersIdData.splice(index,1)
                    location.href = URLMembers ;
                }
            })
        })
    })

    editMemberBtn.forEach((btn,index)=>{
        btn.addEventListener('click',()=>{
            const id = membersIdData[index].textContent
            fetch(`${location.href}?action=edit&id=${id}`)
            .then(res=>res.json())
            .then(data=>{
                if(data.status == 'ok'){
                    membersIdData.splice(index,1)
                    location.href = URLMembers + `/edit?id=${id}`
                }
            })
        })
    })

    activateMemberBtn.forEach((btn)=>{
        btn.addEventListener('click',()=>{
            const id = btn.parentElement.parentElement.children[0].textContent
            fetch(`${location.href}?action=activate&id=${id}`)
            .then(res=>res.json())
            .then(data=>{
                if(data.status == 'ok'){
                    location.href = URLMembers ;
                }
            })
        })
    })

    
}



if(addMemberBtn){
    addMemberBtn.addEventListener('click',(e)=>{
        if(addMemberForm.classList.contains('add-appear')){
            addMemberForm.classList.remove('add-appear')
            table.classList.remove('table-hide')
            e.target.innerHTML = `
            <i class="fa-solid fa-plus"></i>
            Add New Member
            `
        }
        else{
            addMemberForm.classList.add('add-appear')
            table.classList.add('table-hide')
            e.target.textContent = `View All Members`
        }
    })
}

//categories
function saveCategory(id = ''){
    if(saveCategoryBtn){
        saveCategoryBtn.addEventListener('click',(e)=>{
            e.preventDefault();
            const URL = location.href
            const data = new FormData(addCategoryForm)
            data.append("id", id);
            fetch(URL,{
                method : 'POST',
                body : data
            })
            .then(res=>res.json())
            .then(data=>{
                
                if(data.status == 'ok'){
                    addCategoryFormType.value = 'add'
                    location.href = '/shop/admin/pages/dashboard'
                }
                console.log(data)
            })
        })
    }
}

if(addCategoryBtn){
    addCategoryBtn.addEventListener('click',()=>{
        addCategoryFormType.value = 'add'
        CategoryManage.classList.add('categories-hidden')
        addCategoryForm.classList.remove('form-category-hidden')
    })
    saveCategory()
}

if(allCategories && allCategories.length > 0){
    const URL = location.href
    const editCategoryBtn = document.querySelectorAll('.edit-category')
    const deleteCategoryBtn = document.querySelectorAll('.delete-category')
    editCategoryBtn.forEach((btn,index)=>{
        btn.addEventListener('click',()=>{
            CategoryManage.classList.add('categories-hidden')
            addCategoryForm.classList.remove('form-category-hidden')
            const id = allCategories[index].dataset.id
            const newUrl = `${URL}?action=edit_category&id=${id}`
            fetch(newUrl)
            .then(res=>res.json())
            .then(({data,status})=>{
                document.querySelector('.category-name').value = data.name
                document.querySelector('.category-description').value = data.description
                document.querySelectorAll('.category-visibility').forEach(v=>{
                    if(v.value == data.visibility) v.checked = true
                })
                document.querySelectorAll('.comments').forEach(c=>{
                    if(c.value == data.allow_comment) c.checked = true
                })
                document.querySelectorAll('.ads').forEach(a=>{
                    if(a.value == data.allow_ads) a.checked = true
                })
            })
            // window.history.pushState({'detail':'updated by js'},'new page',newUrl)
            // window.history.replaceState({'detail':'updated by js'},'new page',newUrl)
            addCategoryFormType.value = 'edit'
            saveCategory(id)
        })
    })

    deleteCategoryBtn.forEach((btn,index)=>{
        btn.addEventListener('click',()=>{
            const id = allCategories[index].dataset.id
            const newUrl = `${URL}?action=delete_category&id=${id}`
            fetch(newUrl)
            .then(res=>res.json())
            .then(({status})=>{
                if(status == 'ok'){
                    location.href = '/shop/admin/pages/dashboard'
                }
            })
        })
    })
}