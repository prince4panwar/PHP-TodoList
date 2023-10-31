// const deletes = document.querySelectorAll(".delete");
// Array.from(deletes).forEach((element)=>{
// element.addEventListener("click",(e)=>{
//     // e.target.parentNode;
//         return confirm('Are you sure that you want to delete this todo');
        

//     });
// });
let count;
const deletes = document.querySelectorAll(".delete-todo-button");
    deletes.forEach((deleteButon,index)=>{
        
        deleteButon.addEventListener("click",()=>{
            todolist.splice(index,1)
            renderTodoList();
        });
        count = index;
        // console.log(index);
    });
    deletes[count].scrollIntoView();

function checkdelete()
{
    return confirm('Are you sure that you want to delete this todo');
}