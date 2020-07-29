# Точка входа
Точка входа - app/index.php
# Задача
## Условие
Есть большая система, которая приносит значительный доход компании и следовательно к качеству её кода предъявляются высокие требования.

Эта система, помимо всего прочего, использует курсы валют.

Логика получения курсов валют следующая. Вызывающий код может получить их из кеша, из базы данных и из внешнего источника по http. В случае, если курса валют нет в кеше, надо проверить базу, и если там есть, положить в кеш. Если в базе нет -- проверить внешний источник и положить и в базу, и в кеш.

Надо реализовать эту логику. Предполагается, что она будет использоваться в куче разных мест.

Вероятно, в условии есть неточности, какое-то поведение не указано и тд. Нужно самостоятельно принять решение что делать в каждом таком случае и явно это пометить -- либо в комментарии, либо в файле типа readme. В этом же файле напишите, что бы вы сделали по-другому, будь у вас больше времени; какие у вас были соображения, как в целом должен выглядеть этот код, к чему вы вообще стремились.
## Пожелания к реализации
Функционал отправки запросов, хранения данных в базе и в кеше реализовывать не надо, вместо них достаточно сделать заглушки. Иными словами, не нужно реализовывать трудоемкие технические детали. Вместо этого важнее как вы декомпозировали предметную область, как выглядят ваши классы, куда вы поместили логику. Тем не менее, по качеству код должен выглядеть так, как будто вы отдаёте финальную его версию на ревью.
