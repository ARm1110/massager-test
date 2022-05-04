<?php
include '../controller/user.php';
date_default_timezone_set('Iran');
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "Error";
    echo '<script> window.open("../../resource/loginform.php","_self");</script>';
}





echo "Login Success";

echo "<a href='../../resource/loginform.php'> Logout</a> ";
?>
<?php
$get_user = json_decode(file_get_contents('../../storage/users.json'), true);
$all_users = [];

for ($i = 0; $i < count($get_user); $i++) {
    foreach ($get_user[$i] as $key => $value) {
        echo "<pre>";
        //var_dump($key);
        echo "</pre>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <title>Tailwind CSS Response Chat Template</title>

</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<!-- emoj -->
<link rel="stylesheet" href="../../jquery-emoji-picker-master/css/jquery.emojipicker.css">
<script src="//code.jquery.com/jquery.min.js"></script>
<script src="../../jquery-emoji-picker-master/js/jquery.emojipicker.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="../dist/output.css">

<body>


    <?php

    if (is_array($get_user)) {
        # code...
        // for ($i = 0; $i < count($get_user); $i++) {
        //     for

        //     $all_users[$i] =  $get_user[$i]['username'];
        // }
        for ($i = 0; $i < count($get_user); $i++) {
            foreach ($get_user[$i] as $key => $value) {
                // echo "<pre>";
                // var_dump($value['username']);
                // echo "</pre>";
                $all_users[$i] = $value['username'];
            }
        }
    }
    echo "<pre>";
    //var_dump($all_users);
    echo "</pre>";


    // $filter = array_diff($all_users, $active_user);
    // $filter =  array_values($filter);
    ?>
    <?php
    $massaged = null;
    $massagedText = null;

    if (isset($_GET['submit']) && $_GET['submit'] == 'error') {
        $massaged = "error";
        $massagedText = "Wrong username or password!";
    }

    ?>
    <div class=" mx-auto">
        <div class="container mx-auto">
            <div class="min-w-full border rounded lg:grid lg:grid-cols-3">
                <div class="border-r border-gray-300 lg:col-span-1 hidden
lg:block">
                    <div class="mx-3 my-3">
                        <div class="relative text-gray-600">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6 text-gray-300">
                                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </span>
                            <input type="search" class="block w-full py-2 pl-10 bg-gray-100 rounded outline-none" name="search" placeholder="Search" required />
                        </div>
                    </div>

                    <ul class="overflow-auto h-[32rem]">
                        <h2 class="my-2 mb-2 ml-2 text-lg text-gray-600">Chats</h2>

                        <li>
                            <?php
                            for ($i = 0; $i < count($get_user); $i++) {
                                foreach ($get_user[$i] as $key => $value) {
                                    echo "<pre>";
                                    //var_dump($key);
                                    echo "</pre>";

                            ?>

                                    <a class="flex items-center px-3 py-2 text-sm transition duration-150 ease-in-out border-b border-gray-300 cursor-pointer hover:bg-gray-100 focus:outline-none">
                                        <?php if (file_exists('../auth/upload/' . $key . '.jpg')) {
                                            $dir = '../auth/upload/' . $key . '.jpg';
                                        ?>
                                            <img class="object-cover w-10 h-10 rounded-full" src="<?php echo $dir ?>" . alt="username" />
                                        <?php } else {
                                        ?>
                                            <img class="object-cover w-10 h-10 rounded-full" src="../src/img/man-g5079ed4cb_1280.png" alt="username" />
                                        <?php }
                                        ?>
                                        <?php if ($value['username'] == $_SESSION['useid']) {
                                        ?>
                                            <span class=" w-3 h-3 bg-green-600 rounded-full mb-5 "></span>
                                        <?php } else {
                                            //echo ($value['activeUsers']);
                                        ?>
                                            <span class=" w-3 h-3 bg-red-600 rounded-full mb-5 "></span>

                                        <?php }
                                        ?>
                                        <div class="w-full pb-2">
                                            <div class="flex justify-between">
                                                <span class="block ml-2 font-semibold text-gray-600"><?php echo $key; ?></span>

                                                <!-- <span class="block ml-2 text-sm text-gray-600">25 minutes</span> -->
                                            </div>
                                            <!-- <span class="block ml-2 text-sm text-gray-600">bye</span> -->
                                        </div>
                                    </a>
                            <?php     }
                            }
                            ?>
                        </li>
                    </ul>
                </div>
                <div class=" lg:col-span-2 ">
                    <div class="w-full">
                        <div class="relative flex items-center  p-3 border-b border-gray-300">
                            <img class="object-cover w-10 h-10 rounded-full" src="<?php echo "../auth/upload/" . $_SESSION['useid'] . '.jpg' ?>" . . alt="username" />
                            <span class="block ml-2 font-bold text-gray-600"><?php echo $_SESSION['useid']; ?></span>
                            <span class="absolute w-3 h-3 bg-green-600   rounded-full left-10 top-3">
                            </span>
                        </div>
                        <div class="relative w-full bg-gray-200  p-6 overflow-y-auto h-[40rem]">
                            <ul class="space-y-2 " id="ref">

                                <?php $massagedText = get_user_custom('massage.json');
                                // echo '<pre>';
                                // var_dump($massagedText[1]);
                                // echo '</pre>';

                                if (!is_null($massagedText)) {
                                    // echo '<pre>';
                                    // echo ($value['massage']);
                                    // echo '</pre>'; 
                                    foreach ($massagedText as $key => $value) {
                                        if ($value['username'] !== $_SESSION['useid']) {
                                            # code...

                                ?>
                                            <li class="flex flex-col gap-y-2    justify-start " id="<?php echo $value['id']; ?>">
                                                <div>
                                                    <img class="object-cover w-10 h-10  rounded-full" src="<?php echo "../auth/upload/" . $value['username'] . '.jpg' ?>" . . alt="username" />
                                                </div>
                                                <div class="relative max-w-xl px-4 py-2 bg-white text-gray-700 rounded shadow">
                                                    <span class="block"><?php echo stripslashes(htmlspecialchars(($value['massage']))); ?></span>
                                                    <div class="relative max-w-xl px-4 py-2 text-gray-700 ">
                                                        <span class=""><?php echo date("g:i A", $value['time']) ?></span>
                                                    </div>

                                                </div>
                                            </li>
                                        <?php
                                        } else { ?>
                                            <li class="flex justify-end" id="<?php echo $value['id']; ?>">
                                                <div class="relative max-w-xl px-4 py-2 text-gray-700 bg-gray-100 rounded shadow">
                                                    <span class="block"><?php echo ($value['massage']); ?></span>
                                                    <div class="relative max-w-xl px-4 py-2 text-gray-700 ">
                                                        <span class=""><?php echo date("g:i A", $value['time']) ?></span>
                                                    </div>
                                                    <button class="btn-danger" onclick="refresh(this.id)" id="<?php echo $value['id']; ?>">del</button>
                                                    <button class="btn-primary " onclick="rename(this.id)" id="<?php echo $value['id']; ?>">rename</button>
                                                </div>
                                            </li>
                                <?php }
                                    }
                                } ?>

                            </ul>
                        </div>


                        <span class="flex items-center justify-between w-full p-3 border-t border-gray-300">
                            <input name="emoj" id="emoj" hidden>
                            <label for="emoj" class="cursor-pointer">
                                <svg xmlns=" http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </label>
                            <input type="file" name="file" id="upload" hidden>
                            <label for="upload" class="cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                </svg>
                            </label>


                            <input type="text" placeholder="Message" id="massage" class="block w-full py-2 pl-4 mx-3 bg-gray-100 rounded-full outline-none focus:text-gray-700" name="massage" required />
                            <input value="<?php echo $_SESSION['useid']; ?>" name='username' hidden="true" id="username" />
                            <input value="<?php echo time(); ?>" name='time' hidden="true" id="time" />
                            <button onclick="send_massage()">
                                <svg class="w-5 h-5 text-gray-500 origin-center transform rotate-90" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                                </svg>
                            </button>
                        </span>

                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <script src="../auth/massage_prosses.js"></script>
</body>

</html>