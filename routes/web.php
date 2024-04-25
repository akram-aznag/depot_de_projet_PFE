<?php

use App\Http\Controllers\AdminBlogController;
use Illuminate\Http\Request;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogerController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthContoller;
use App\Http\Controllers\bloger;
use App\Http\Controllers\BloggerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserCrud;
use App\Http\Controllers\UserCrudController;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("locale/{lang}",[LanguageController::class,'SetLang'])->name('language_route');
Route::get('/',[BlogerController::class,'guestpage'])->name('guest_page');
Route::get('/blogs/details/{slug}',function(string $slug){
   // $post = Post::where('slug', $slug)->with('user:id,name','comments.replies','comments.user:id,name','comments.replies.user','comments.replies.replies')->first();
    //dd($post->toArray());
   $post_data = Post::where('slug', $slug)->with('user','comments.replies','comments.user:id,name,photo','comments.replies.user','comments.replies.replies')->first();
   return view('content.blog_details')->with('post_data',$post_data);

})->name('single');

Route::get('/posts/posts-categories/choose-post-category',function(){
    return view('bloger.categorypages.blogcategories');
})->name('blogs_categories');
Route::post('/posts/posts-categories/get-post-category',[CategoryController::class,'get_category_result'])->name('get_category');
Route::get('/help/contact/message-us',[MessageController::class,'create_message'])->name('create_message');
Route::post('/help/contact/message-us/save-message',[MessageController::class,'save_message'])->name('save_message');

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/bloger/dashboard',[BlogerController::class,'bloger_dashboard'])->name('dashboard');
    Route::get('/bloger/dashboard/editprofile',[BlogerController::class,'edit_bloger_profile'])->name('EDITPROFILE');
    Route::post('/bloger/dashboard/updateprofile/{id}',[BlogerController::class,'update_bloger_profile'])->name('UPDATEPROFILE');
    Route::get('/bloger/dashboard/changepassword',[BlogerController::class,'change_bloger_password'])->name('CHANGEPASSWORD');
    Route::post('/bloger/dashboard/resetpassword/{id}',[BlogerController::class,'reset_bloger_password'])->name('RESETPASSWORD');
    Route::get('/bloger/dashboard/create-blog',[PostController::class,'create_blog'])->name('create-blog');
    Route::post('/bloger/dashboard/add-blog/{id}',[PostController::class,'add_blog'])->name('ADDBLOG');
    Route::get('/bloger/dashboard/manage-my-blogs',[PostController::class,'manage_blogs'])->name('manage_blogs');
    Route::get('/bloger/dashboard/{id}/edit',[PostController::class,'edit_blog'])->name('edit_blog');
    Route::post('/bloger/dashboard/{user_id}/{id}/update',[PostController::class,'update_blog'])->name('update_blog');
    Route::get('/bloger/dashboard/deleted-blog-with-id/{id}',[PostController::class,'delete_blog'])->name('delete_blog');
    Route::get('LOGOUT',[AuthContoller::class,'bloger_logout'])->name('LOGOUT');
    //
    Route::post('/bloger/dashboard/comments/post-id:{post_id}/user-id:{user_id}/add-comment',[CommentController::class,'store_comment'])->name('store_comment');
    Route::post('/bloger/dashboard/comments/post-id:{post_id}/user-id:{user_id}/comment-parent-id:{parent_id}/add-comment/reply',[CommentController::class,'store_comment_reply'])->name('store_comment_reply');
    Route::post('/bloger/dashboard/comments/post-id:{post_id}/user-id:{user_id}/comment-parent-id:{parent_id}/add-comment/reply-to-comment/reply',[CommentController::class,'store_comment_reply_reply'])->name('store_comment_reply_reply');
    Route::get('/bloger/dashboard/comments/show_bloger_comments',[CommentController::class,'show_bloger_comments'])->name('show_bloger_comments');
    Route::get('/bloger/dashboard/comments/show_bloger_comments/{comment_id}/delete_comment',[CommentController::class,'delete_bloger_comments'])->name('delete_bloger_comments');

  
    Route::get('/bloger/dashboard/post-id:{post_id}/user-id:{user_id}/like-post',[LikesController::class,'like_post'])->name('like');
    Route::post('/bloger/dashboard/post-id:{post_id}/user-id:{user_id}/unlike-post',[LikesController::class,'unlike_post'])->name('unlike');

    

});

/*Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});*/

require __DIR__.'/auth.php';
Route::middleware(['auth', 'role:admin'])->group(function(){
    //admin abilities 
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout',[AdminController::class,'destroy'])->name('admin.logout');
    Route::get('/admin/profile',[AdminController::class,'AdminProfile'])->name('admin.profile');
    Route::put('/admin/update_profile/{id}',[AdminController::class,'Updateprofile'])->name('admin.update_profile');
    Route::get('/admin/change/password',[AdminController::class,'changepassword'])->name('admin.change.password');
    Route::put('/admin/update/password',[AdminController::class,'updatepassword'])->name('admin.update.password');
    //user crud routes
    Route::get('/admin/dashboard/users',[UserCrudController::class,'show_users'])->name('users');
    Route::get('/admin/dashboard/users/delete-user with id {id}',[UserCrudController::class,'delete_user'])->name('delete');
    Route::get('/admin/dashboard/users/edit-user with id {id}',[UserCrudController::class,'edit_user'])->name('edit');
    Route::post('/admin/dashboard/users/update-user with id {id}',[UserCrudController::class,'update_user'])->name('update');
    Route::get('/admin/dashboard/users/show-user with id {id}',[UserCrudController::class,'show_user'])->name('show');
    Route::get('/admin/dashboard/users/create-new-user',[UserCrudController::class,'create_user'])->name('create');
    Route::post('/admin/dashboard/users/add-new-user',[UserCrudController::class,'add_user'])->name('add');

     //categories crud 
    Route::get('/admin/dashboard/categories',[CategoryController::class,'show_categories'])->name('categories');
    Route::get('/admin/dashboard/categories/show-category with id {id}',[CategoryController::class,'show_category'])->name('show_category');
    Route::get('/admin/dashboard/categories/edit-category with id {id}',[CategoryController::class,'edit_category'])->name('edit_category');
    Route::post('/admin/dashboard/categories/update-category with id {id}',[CategoryController::class,'update_category'])->name('update_category');
    Route::get('/admin/dashboard/categories/delete-category with id {id}',[CategoryController::class,'delete_category'])->name('delete_category');
    Route::get('/admin/dashboard/categories/create-new-category',[CategoryController::class,'create_category'])->name('create_category');
    Route::post('/admin/dashboard/categories/add-new-category',[CategoryController::class,'add_category'])->name('add_category');
    //posts crud

    Route::get('/admin/dashboard/posts',[AdminBlogController::class,'show_blogs'])->name('posts');
    Route::get('/admin/dashboard/Posts/Post/{post_id}',[AdminBlogController::class,'get_blog'])->name('post');
    Route::get('/admin/dashboard/posts/create-new-blog',[AdminBlogController::class,'create_blog'])->name('create_blog');
    Route::post('/admin/dashboard/posts/admin-id:{admin_id}/add-new-blog/',[AdminBlogController::class,'add_blog'])->name('add_blog');
    Route::get('/admin/dashboard/posts/post-id:{post_id}/delete-blog',[AdminBlogController::class,'delete_blog'])->name('admin.delete_blog');
    Route::get('/admin/dashboard/posts/post-id:{post_id}/edit-blog',[AdminBlogController::class,'edit_blog'])->name('admin.edit_blog');
    Route::post('/admin/dashboard/posts/post-id:{post_id}/update-blog',[AdminBlogController::class,'update_blog'])->name('admin.update_blog');
    //
    Route::get('/admin/dashboard/posts/admin-posts',[AdminBlogController::class,'show_admin_blogs'])->name('show_admin_blogs');
    Route::get('/admin/dashboard/posts/post/{post_id}',[AdminBlogController::class,'show_admin_blog'])->name('show_admin_blog');
    //comments managment
    Route::get('/admin/dashboard/comments',[AdminBlogController::class,'manage_blogers_comments'])->name('comments');
    Route::get('/admin/dashboard/comments/comment-id:{comment_id}',[AdminBlogController::class,'blogers_comments_details'])->name('comment_details');
    Route::get('/admin/dashboard/comments/comment-id:{comment_id}/delete',[AdminBlogController::class,'delete_blog_comment'])->name('delete_comment');
    //messages management
    Route::get('/admin/dashboard/messages',[MessageController::class,'manage_messages'])->name('messages');
    Route::get('/admin/dashboard/messages/delete-message/{message_id}',[MessageController::class,'delete_message'])->name('delete_message');
    Route::get('/admin/dashboard/users/generate-users-pdf',[AdminController::class,'genrate_blogers_pdf'])->name('genrate_blogers_pdf');





    // Route::get('/admin/dashboard/categories/show-post with id {id}',[CategoryController::class,'show_category'])->name('show_category');
    // Route::get('/admin/dashboard/categories/edit-post with id {id}',[CategoryController::class,'edit_category'])->name('edit_category');
    // Route::post('/admin/dashboard/categories/update-post with id {id}',[CategoryController::class,'update_category'])->name('update_category');
    // Route::get('/admin/dashboard/categories/delete-post with id {id}',[CategoryController::class,'delete_category'])->name('delete_category');
    // Route::get('/admin/dashboard/categories/create-post-category',[CategoryController::class,'create_category'])->name('create_category');
    // Route::post('/admin/dashboard/categories/add-post-category',[CategoryController::class,'add_category'])->name('add_category');

});//end group admin middleware
Route::get('VERIFYEMAIL/{token}', [AuthContoller::class, 'verifyemail'])->name('VERIFYEMAIL');
Route::get('Forget-Password', [AuthContoller::class, 'forgerpassword'])->name('Forget-Password');
Route::post('Reset-Password', [AuthContoller::class, 'resetpasswordlink'])->name('Reset-Password');
Route::get('Modify-Password/{token}', [AuthContoller::class, 'modifypassword'])->name('Modify-Password');
Route::post('Update-password/{token}', [AuthContoller::class, 'updatepassword'])->name('Update-Password');



