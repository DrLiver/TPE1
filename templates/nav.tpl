<nav id="nav">
    <ul>
    {if ($SESSION == '')}
        <li><a href="home">home</a></li>  
    {/if}
    {if ($SESSION != '')}
        <li><a href="home">home</a></li>
        <li><a href="admin">admin</a></li>
        <li><a href="usersList">users</a></li>      
    {/if}
    </ul>
</nav>