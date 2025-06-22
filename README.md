
# 🗂️ TaskManagerOOP

نظام إدارة مهام باستخدام البرمجة الكائنية (OOP) بلغة PHP.

---

## 🧠 فكرة المشروع

يتيح لك المشروع:

- تسجيل مستخدمين.
- تسجيل الدخول والخروج.
- إضافة وحذف وتعديل مهام.
- عرض قائمة المهام لكل مستخدم.
- حماية الصفحات باستخدام الجلسات (Sessions).
- استخدام بنية منظمة للكود وفقًا لمفاهيم OOP.

---

## ✅ المبادئ المستخدمة من OOP

### 1. 🔒 Encapsulation (الكبسلة)

- استخدمت خصائص `private` داخل الكلاسات مثل `Task`, `User`.
- استخدمت `getters` و `setters` للوصول للبيانات بشكل آمن ومنظم.

```php
private $title;

public function getTitle() {
    return $this->title;
}
```

🟢 الهدف: حماية الكائنات من التعديل العشوائي وتنظيم طريقة الوصول للبيانات.

---

### 2. 🧼 Abstraction (التجريد)

- كلاس `Auth` يحتوي على منطق تسجيل الدخول والخروج بعيدًا عن منطق الواجهة.
- كلاس `Task` يعبر عن مفهوم المهمة ويحتوي على كل ما يتعلق بها.

🟢 الهدف: إخفاء التفاصيل الداخلية وتقديم واجهة واضحة وبسيطة للتعامل مع الكائنات.

---

### 3. 🧬 Inheritance (الوراثة)

❌ غير مفعّلة في هذا المشروع، لكن يمكن إضافتها لاحقًا مثل:

- `AdminUser` يرث من `User`
- `TaskWithDeadline` يرث من `Task`

🟡 ملاحظة: الكود منظم لتقبل إضافة الوراثة لاحقًا بدون مشاكل.

---

### 4. 🌀 Polymorphism (تعدد الأشكال)

❌ لم يُستخدم بشكل مباشر، لكن المشروع مؤهل لاستخدام `interfaces` أو `abstract classes` لتنفيذ هذا المبدأ لاحقًا.

---

## 🛠️ التقنيات المستخدمة

- PHP (مع OOP)
- MySQL + PDO
- HTML5
- Bootstrap 5 (RTL)
- JavaScript / jQuery
- الجلسات (Sessions) للحماية

---

## 📂 هيكل المشروع

```
TaskManagerOOP/
├── classes/
│   ├── User.php
│   ├── Task.php
│   └── Auth.php
├── db/
│   └── connection.php
├── pages/
│   ├── login.php
│   ├── register.php
│   ├── dashboard.php
│   ├── add_task.php
│   └── edit_task.php
├── templates/
│   ├── header.php
│   └── footer.php
├── index.php
├── README.md
└── .gitignore
```

---

## 🚀 خطوات تشغيل المشروع

1. تأكد من تشغيل WAMP أو XAMPP.
2. أنشئ قاعدة بيانات جديدة في MySQL باسم `task_manager`.
3. أنشئ الجداول (users, tasks) يدويًا أو باستخدام سكربت SQL.
4. تأكد من تعديل إعدادات الاتصال داخل `db/connection.php`.
5. شغل المشروع عبر الرابط:

```
http://localhost/TaskManagerOOP/pages/login.php
```

---

## 👨‍💻 المؤلف

أحمد البطل  
مشروع تعليمي لتعلم مبادئ OOP باستخدام PHP و MySQL
