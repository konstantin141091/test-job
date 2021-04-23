@extends('layout')
@section('content')
    <div class="container content">
        <div class="modal" tabindex="-1" role="dialog" id="modal-delete" data-modal-car-id="">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title">Удаление автомобиля</h5>
                        <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Удалить автомобиль №<span id="modal-car"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="modal-delete-btn">Удалить</button>
                        <button type="button" class="btn btn-secondary modal-close" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>

        <h2>Список автомобилей</h2>
        <div class="container d-flex justify-content-start align-items-center">
            <a href="{{ route('cars.create') }}" class="btn btn-primary mr-3">Добавить авто</a>
            <div class="form-inline mr-3">
                <input class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="Search" id="search-input">
                <button class="btn btn-outline-success my-2 my-sm-0" id="search-btn">Найти</button>
            </div>
            <select class="form-control w-25">
                <option>Свободные</option>
                <option>Занятые</option>
                <option>Закрытые</option>
            </select>
        </div>

        <div class="cars mt-4">
            <table class="table">
                <thead class="thead-dark">
                <tr class="text-center">
                    <th scope="col">№</th>
                    <th scope="col">Марка</th>
                    <th scope="col">Регистрационый номер</th>
                    <th scope="col">Год выпуска</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Данные</th>
                    <th scope="col">Осаго</th>
                    <th scope="col">Лицензия</th>
                    <th scope="col">Цвет</th>
                    <th scope="col">Время учета</th>
                    <th scope="col">Пробег</th>
                    <th scope="col">Осталось до ТО</th>
                    <th scope="col">Управление</th>
                </tr>
                </thead>
                <tbody>
                @forelse($cars as $item)
                    <tr id="tr-car-{{ $item->id }}">
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->number }}</td>
                        <td>{{ $item->year }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->data }}</td>
                        <td>{{ $item->osago }}</td>
                        <td>{{ $item->license }}</td>
                        <td>{{ $item->color }}</td>
                        <td>{{ $item->time_accounting }}</td>
                        <td>{{ $item->mileage }}</td>
                        <td>{{ $item->service }}</td>
                        <td class="d-flex justify-content-between">
                            <a href="{{ route('cars.edit', $item->id) }}"><i class="fas fa-pen"></i></a>
                            <button data-car-id="{{ $item->id }}" class="car-delete" id="car-{{ $item->id }}"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>Ничего нет</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
{{--        удаление--}}
        <script>
          let btns = document.querySelectorAll('.car-delete');
          const modal = document.getElementById('modal-delete');
          const modal_car = document.getElementById('modal-car');
          const modal_close = document.querySelectorAll('.modal-close');
          const modal_delete_btn = document.getElementById('modal-delete-btn');
          const modal_title = document.getElementById('modal-title');
// close
          modal_close.forEach((item) => {
            item.addEventListener('click', (event) => {
              modal.classList.remove('d-block');
              modal_title.textContent = "Удаление автомобиля";
            })
          });
// delete
          modal_delete_btn.addEventListener('click', (event) => {
            const modal_car_id = modal.getAttribute('data-modal-car-id');
            (
              async () => {
                const response = await fetch('/api/cars', {
                  method: 'delete',
                  headers: {
                    'Accept': 'application/json, text/plain, */*',
                    'Content-Type': 'application/json'
                  },
                  body: JSON.stringify({
                    id: modal_car_id
                  })
                });
                const answer = await response.json();
                if (answer.status === "good") {
                  let car = document.getElementById('tr-car-' + modal_car_id);
                  car.remove();
                  modal.classList.remove('d-block');
                } else {
                  modal_title.textContent = "Не удалосб удалить автомобиль. Попробуйте еще раз";
                }

              }
            )();

          });
          // на кнопки таблицы
          btns.forEach((btn) => {
            btn.addEventListener('click', (event) => {

              let car_id = btn.getAttribute('data-car-id');
              modal_car.textContent = car_id;
              modal.classList.add('d-block');
              modal.setAttribute('data-modal-car-id', car_id);
            })
          });
        </script>

{{--        поиск--}}
        <script>
            const search_input = document.getElementById('search-input');
            const search_btn = document.getElementById('search-btn');
            console.log(search_btn);

            search_btn.addEventListener('click', (event) => {
              let value = search_input.value;
              (
                async () => {
                  const response = await fetch('/api/cars/search/?value=' + value);
                  const answer = await response.json();
                }
              )();
            })
        </script>
    </div>
@endsection
