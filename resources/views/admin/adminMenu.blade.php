<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Меню админа
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('admin.news.create') }}">
            Добавить новость
        </a>
        <a class="dropdown-item" href="{{ route('admin.category.create') }}">
            Добавить категорию
        </a>
        <a class="dropdown-item" href="{{ route('admin.category.index') }}">
            Изменение категорий
        </a>
        <a class="dropdown-item" href="{{ route('admin.users.index') }}">
            Редактирование пользователей
        </a>
        <a class="dropdown-item" href="{{ route('admin.json') }}">
            Скачать новости (Json)
        </a>
        <a class="dropdown-item" href="{{ route('admin.parse') }}">
            Скачать новости на сайт
        </a>
        <a class="dropdown-item" href="{{ route('admin.resources.index') }}">
            Новостные ресурсы
        </a>
        <a class="dropdown-item" href="{{ route('admin.resources.create') }}">
            Добавить ресурс
        </a>
    </div>
</li>
