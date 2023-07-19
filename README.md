// Получение пользователей
$users = $api->getUsers();
var_dump($users);

// Получение постов пользователя
$userId = 1;
$posts = $api->getUserPosts($userId);
var_dump($posts);

// Получение заданий пользователя
$todos = $api->getUserTodos($userId);
var_dump($todos);

// Получение конкретного поста
$postId = 1;
$post = $api->getPost($postId);
var_dump($post);

// Добавление поста
$newPost = $api->addPost($userId, 'New Post Title', 'New Post Body');
var_dump($newPost);

// Редактирование поста
$updatedPost = $api->updatePost($postId, 'Updated Post Title', 'Updated Post Body');
var_dump($updatedPost);

// Удаление поста
$isDeleted = $api->deletePost($postId);
var_dump($isDeleted);
