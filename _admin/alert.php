<?php
    if (isset($_SESSION['alertOff'])) {
        ?>
        <div id="" class="alert bg-white transition-opacity duration-500">
            <div id="alert-border-3" class="flex items-center p-4 mb-4 text-<?php echo $_SESSION['alertOffColor'] ?>-800 border-t-4 border-<?php echo $_SESSION['alertOffColor'] ?>-300 bg-<?php echo $_SESSION['alertOffColor'] ?>-50 dark:text-<?php echo $_SESSION['alertOffColor'] ?>-400 dark:bg-gray-800 dark:border-<?php echo $_SESSION['alertOffColor'] ?>-800" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <div class="ml-3 text-sm font-medium">
                    <?php 
                    echo $_SESSION['alertOff']
                    ?>
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-<?php echo $_SESSION['alertOffColor'] ?>-50 text-<?php echo $_SESSION['alertOffColor'] ?>-500 rounded-lg focus:ring-2 focus:ring-<?php echo $_SESSION['alertOffColor'] ?>-400 p-1.5 hover:bg-<?php echo $_SESSION['alertOffColor'] ?>-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-<?php echo $_SESSION['alertOffColor'] ?>-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-3" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        </div>
        <?php
        // Reset the session variable to prevent displaying the alert on page reload
        unset($_SESSION['alertOff']);
        unset($_SESSION['alertOffColor']);
    }
?>