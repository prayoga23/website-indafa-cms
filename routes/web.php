<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
// use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Admin\FacultyController as AdminFacultyController;
use App\Http\Controllers\Admin\StudyProgramController as AdminStudyProgramController;
use App\Http\Controllers\Admin\LecturerController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\AnnouncementController as AdminAnnouncementController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\GalleryPhotoController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\BannerController as AdminBannerController;
use App\Http\Controllers\Admin\WebsiteSettingController;
use App\Http\Controllers\Admin\WelcomeMessageController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\CampusStatisticController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\VisionMissionController;
use App\Http\Controllers\Admin\OrgStructureController;
use App\Http\Controllers\Admin\CurriculumController;
use App\Http\Controllers\Admin\CplController;
use App\Http\Controllers\Admin\AcademicCalendarController;
use App\Http\Controllers\Admin\AcademicGuideController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\PhotoGalleryController;
use App\Http\Controllers\Admin\VideoGalleryController;
use App\Http\Controllers\Admin\AcademicDocumentController;

// Frontend Controllers
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProfilController;
use App\Http\Controllers\Frontend\AkademikController;
use App\Http\Controllers\Frontend\InformasiController;
use App\Http\Controllers\Frontend\GaleriController;
use App\Http\Controllers\Frontend\DownloadController;

use App\Http\Controllers\Frontend\FacultyController as FrontendFacultyController;
use App\Http\Controllers\Frontend\StudyProgramController as FrontendStudyProgramController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\AnnouncementController as FrontendAnnouncementController;
use App\Http\Controllers\Frontend\GalleryController as FrontendGalleryController;
use App\Http\Controllers\Frontend\PageController as FrontendPageController;
use App\Http\Controllers\Frontend\NewsController as FrontendNewsController;
use App\Http\Controllers\Frontend\UnitController;
use App\Http\Controllers\Frontend\FacultySubWebController;
use App\Http\Controllers\Frontend\ProdiSubWebController;



use Illuminate\Http\Request;



/*
|--------------------------------------------------------------------------
| BERANDA
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| PROFIL
|--------------------------------------------------------------------------
*/
Route::get('/sejarah-prodi', [ProfilController::class, 'sejarah'])->name('frontend.profil.sejarah');
Route::get('/visi-misi', [ProfilController::class, 'visiMisi'])->name('frontend.profil.visi-misi');
Route::get('/struktur-organisasi', [ProfilController::class, 'struktur'])->name('frontend.profil.struktur-organisasi');
Route::get('/profil-dosen', [ProfilController::class, 'dosen'])->name('frontend.profil.profil-dosen');

/*
|--------------------------------------------------------------------------
| FAKULTAS SUB-WEBSITE ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('fakultas-{faculty}')->group(function () {
    Route::get('/', [FacultySubWebController::class, 'index'])->name('frontend.fakultas.index');
    Route::get('/sejarah', [FacultySubWebController::class, 'sejarah'])->name('frontend.fakultas.sejarah');
    Route::get('/visi-misi', [FacultySubWebController::class, 'visiMisi'])->name('frontend.fakultas.visi-misi');
    Route::get('/pimpinan', [FacultySubWebController::class, 'pimpinan'])->name('frontend.fakultas.pimpinan');
    Route::get('/akademik/{page}', [FacultySubWebController::class, 'akademik'])->name('frontend.fakultas.akademik');
    Route::get('/pengumuman', [FacultySubWebController::class, 'pengumuman'])->name('frontend.fakultas.pengumuman');
    Route::get('/berita', [FacultySubWebController::class, 'berita'])->name('frontend.fakultas.berita');
    Route::get('/kontak', [FacultySubWebController::class, 'kontak'])->name('frontend.fakultas.kontak');
});

// Backward compatibility routes for navigation links
Route::get('/fakultas-syariah', function () { return redirect()->route('frontend.fakultas.index', 'syariah'); })->name('frontend.fakultas.syariah');
Route::get('/fakultas-ebit', function () { return redirect()->route('frontend.fakultas.index', 'ebit'); })->name('frontend.fakultas.ebit');

/*
|--------------------------------------------------------------------------
| PRODI SUB-WEBSITE ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('prodi-{prodi}')->group(function () {
    Route::get('/', [ProdiSubWebController::class, 'index'])->name('frontend.prodi.index');
    Route::get('/sejarah', [ProdiSubWebController::class, 'sejarah'])->name('frontend.prodi.sejarah');
    Route::get('/visi-misi', [ProdiSubWebController::class, 'visiMisi'])->name('frontend.prodi.visi-misi');
    Route::get('/pimpinan', [ProdiSubWebController::class, 'pimpinan'])->name('frontend.prodi.pimpinan');
    Route::get('/akademik/{page}', [ProdiSubWebController::class, 'akademik'])->name('frontend.prodi.akademik');
    Route::get('/pengumuman', [ProdiSubWebController::class, 'pengumuman'])->name('frontend.prodi.pengumuman');
    Route::get('/berita', [ProdiSubWebController::class, 'berita'])->name('frontend.prodi.berita');
    Route::get('/kontak', [ProdiSubWebController::class, 'kontak'])->name('frontend.prodi.kontak');
});

/*
|--------------------------------------------------------------------------
| UNIT & LEMBAGA
|--------------------------------------------------------------------------
*/
Route::get('/unit/lpm', [UnitController::class, 'lpm'])->name('frontend.unit.lpm');
Route::get('/unit/lp2m', [UnitController::class, 'lp2m'])->name('frontend.unit.lp2m');
Route::get('/unit/ormawa', [UnitController::class, 'ormawa'])->name('frontend.unit.ormawa');

/*
|--------------------------------------------------------------------------
| AKADEMIK
|--------------------------------------------------------------------------
*/

Route::get('/kurikulum', [AkademikController::class, 'kurikulum'])->name('frontend.akademik.kurikulum');
Route::get('/cpl', [AkademikController::class, 'cpl'])->name('frontend.akademik.cpl');
Route::get('/kalender', [AkademikController::class, 'kalender'])->name('frontend.akademik.kalender');
Route::get('/panduan-akademik', [AkademikController::class, 'panduan'])->name('frontend.akademik.panduan');
Route::get('/jadwal-kuliah', [AkademikController::class, 'jadwal'])->name('frontend.akademik.jadwal');
Route::get('/filosofi-logo', [AkademikController::class, 'filosofiLogo'])->name('frontend.akademik.filosofi-logo');
Route::get('/penelitian-pengabdian', [AkademikController::class, 'penelitian'])->name('frontend.akademik.penelitian');
Route::get('/pmb', [AkademikController::class, 'pmb'])->name('frontend.akademik.pmb');
Route::get('/prestasi-mahasiswa', [AkademikController::class, 'prestasi'])->name('frontend.akademik.prestasi');
Route::get('/gallery-indafa', [AkademikController::class, 'galleryIndafa'])->name('frontend.akademik.gallery-indafa');



/*
|--------------------------------------------------------------------------
| INFORMASI
|--------------------------------------------------------------------------
*/
Route::get('/informasi/berita', [InformasiController::class, 'berita'])->name('frontend.informasi.berita');
Route::get('/informasi/berita/{slug}', [InformasiController::class, 'detailBerita'])->name('informasi.berita.detail');

Route::get('/informasi/pengumuman', [InformasiController::class, 'pengumuman'])->name('frontend.informasi.pengumuman');
Route::get('/informasi/pengumuman/{slug}', [InformasiController::class, 'detailPengumuman'])->name('frontend.informasi.pengumuman.detail');
Route::get('/informasi/agenda', [InformasiController::class, 'agenda'])->name('frontend.informasi.agenda');



/*
|--------------------------------------------------------------------------
| GALERI
|--------------------------------------------------------------------------
*/


Route::get('/galeri/foto', [GaleriController::class, 'fotoGallery'])->name('frontend.galeri.foto');
Route::get('/galeri/video', [GaleriController::class, 'videoGallery'])->name('frontend.galeri.video');

/*
|--------------------------------------------------------------------------
| DOKUMEN
|--------------------------------------------------------------------------
*/

  Route::get('/dokumen', [DownloadController::class, 'index'])->name('frontend.dokumen.index');


/*
|--------------------------------------------------------------------------
| KONTAK
|--------------------------------------------------------------------------
*/

Route::get('/frontend-kontak.', [\App\Http\Controllers\Frontend\HubungiKamiController::class, 'index'])->name('frontend.hubungi.index');
Route::post('/kontak', [\App\Http\Controllers\Frontend\HubungiKamiController::class, 'storeMessage'])->name('frontend.kontak.store');
    Route::get('/frontend.kontak.index', function () {
        return view('frontend.kontak.index');
    })->name('frontend.kontak.index');





/*
|--------------------------------------------------------------------------
| Frontend
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/fakultas/{slug}', [FrontendFacultyController::class, 'show'])
    ->name('faculties.show');

Route::get('/program-studi/{slug}',[FrontendStudyProgramController::class, 'show'])->name('programs.show');
// Route::get('/program-studi/{slug}',[FrontendStudyProgramController::class, 'show'])->name('programs.page.show');

Route::get('/kontak', [ContactController::class, 'index'])->name('contact.index');

Route::get('/pengumuman', [FrontendAnnouncementController::class, 'index'])->name('announcements.index');
Route::get('/pengumuman/{slug}', [FrontendAnnouncementController::class, 'show'])->name('announcements.show');

Route::get('/galeri', [FrontendGalleryController::class, 'index'])->name('gallery.index');
Route::get('/galeri/{slug}', [FrontendGalleryController::class, 'show'])->name('gallery.show');

Route::get('/halaman/{slug}', [FrontendPageController::class, 'show'])->name('page.show');

Route::get('/berita', [FrontendNewsController::class, 'index'])->name('news.index');
Route::get('/berita/{slug}', [FrontendNewsController::class, 'show'])->name('news.show');



// Route::get('/', function () {
//     return view('welcome');
// });

/*
|--------------------------------------------------------------------------
| Dashboard Breeze
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Panel
|--------------------------------------------------------------------------
*/


Route::post('/admin/upload-image', function (Illuminate\Http\Request $request) {

    if ($request->hasFile('upload')) {

        $path = $request->file('upload')->store('news', 'public');

        return response()->json([
            'url' => asset('storage/' . $path)
        ]);
    }

    return response()->json([
        'error' => 'No file uploaded'
    ], 400);
})->name('ckeditor.upload');

Route::prefix('admin')
    ->middleware(['auth'])
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | Master Data
        |--------------------------------------------------------------------------
        */

        Route::resource('faculties', AdminFacultyController::class);
        Route::resource('study-programs',AdminStudyProgramController::class);
        Route::resource('lecturers', LecturerController::class);
        Route::resource('news', AdminNewsController::class);
        Route::get('/admin/news/{id}', [AdminNewsController::class, 'show'])->name('admin.news.show');
        Route::resource('announcements', AdminAnnouncementController::class);
        Route::resource('galleries', AdminGalleryController::class);
        Route::post('galleries/{gallery}/photos',[GalleryPhotoController::class, 'store'])->name('galleries.photos.store');
        Route::delete('gallery-photos/{galleryPhoto}',[GalleryPhotoController::class, 'destroy'])->name('gallery-photos.destroy');
        Route::resource('pages',AdminPageController::class);
        Route::get('pages/edit-by-slug/{slug}', [AdminPageController::class, 'editBySlug'])->name('pages.edit-by-slug');
        Route::resource('banners',AdminBannerController::class);
        Route::get('website-settings',[WebsiteSettingController::class,'index'])->name('website-settings.index');
        Route::put('website-settings',[WebsiteSettingController::class,'update'])->name('website-settings.update');
        Route::get('homepage-settings',[WebsiteSettingController::class,'homepageIndex'])->name('homepage-settings.index');
        Route::put('homepage-settings',[WebsiteSettingController::class,'homepageUpdate'])->name('homepage-settings.update');
        /*
        |--------------------------------------------------------------------------
        | Beranda/Sambutan
        |--------------------------------------------------------------------------
        */

        Route::get('/sambutan', [WelcomeMessageController::class, 'index'])->name('sambutan.index');
        Route::put('/sambutan', [WelcomeMessageController::class, 'update'])->name('sambutan.update');

        Route::resource('agenda', AgendaController::class);

        Route::get('/statistik', [CampusStatisticController::class, 'index'])->name('statistic.index');
        Route::put('/statistik', [CampusStatisticController::class, 'update'])->name('statistic.update');

        // Route Sejarah Prodi
        Route::get('/sejarah', [HistoryController::class, 'index'])->name('history.index');
        Route::post('/sejarah/info', [HistoryController::class, 'updateInfo'])->name('history.info.update');
        Route::post('/sejarah/timeline', [HistoryController::class, 'storeTimeline'])->name('history.timeline.store');
        Route::delete('/sejarah/timeline/{historyTimeline}', [HistoryController::class, 'destroyTimeline'])->name('history.timeline.destroy');


        // Route Visi Misi
        Route::get('/visi-misi', [VisionMissionController::class, 'index'])->name('vision.index');
        Route::post('/visi-misi/vision', [VisionMissionController::class, 'updateVision'])->name('vision.update');
        Route::post('/visi-misi/item', [VisionMissionController::class, 'storeItem'])->name('vision.item.store');
        Route::delete('/visi-misi/item/{visionMissionItem}', [VisionMissionController::class, 'destroyItem'])->name('vision.item.destroy');

        // Route Struktur Organisasi
        Route::get('/struktur-organisasi', [OrgStructureController::class, 'index'])->name('structure.index');
        Route::post('/struktur-organisasi', [OrgStructureController::class, 'store'])->name('structure.store');
        Route::delete('/struktur-organisasi/{organizationalStructure}', [OrgStructureController::class, 'destroy'])->name('structure.destroy');


            // Route Kurikulum
        Route::get('/kurikulum', [CurriculumController::class, 'index'])->name('curriculum.index');
        Route::post('/kurikulum/info', [CurriculumController::class, 'updateInfo'])->name('curriculum.info.update');
        Route::post('/kurikulum/course', [CurriculumController::class, 'storeCourse'])->name('curriculum.course.store');
        Route::delete('/kurikulum/course/{course}', [CurriculumController::class, 'destroyCourse'])->name('curriculum.course.destroy');

            // Route Capaian Pembelajaran Lulusan (CPL)
        Route::get('/cpl', [CplController::class, 'index'])->name('cpl.index');
        Route::post('/cpl', [CplController::class, 'store'])->name('cpl.store');
        Route::delete('/cpl/{graduateLearningOutcome}', [CplController::class, 'destroy'])->name('cpl.destroy');

        // Route Kalender Akademik
        Route::get('/kalender-akademik', [AcademicCalendarController::class, 'index'])->name('calendar.index');
        Route::post('/kalender-akademik/agenda', [AcademicCalendarController::class, 'storeAgenda'])->name('calendar.agenda.store');
        Route::post('/kalender-akademik/upload-pdf', [AcademicCalendarController::class, 'updatePdf'])->name('calendar.pdf.update');
        Route::delete('/kalender-akademik/agenda/{calendar}', [AcademicCalendarController::class, 'destroyAgenda'])->name('calendar.agenda.destroy');


        Route::get('/panduan-akademik', [AcademicGuideController::class, 'index'])->name('guide.index');
        Route::post('/panduan-akademik/buku', [AcademicGuideController::class, 'storeBook'])->name('guide.book.store');
        Route::delete('/panduan-akademik/buku/{guidebook}', [AcademicGuideController::class, 'destroyBook'])->name('guide.book.destroy');

        Route::post('/panduan-akademik/prosedur', [AcademicGuideController::class, 'storeStep'])->name('guide.step.store');
        Route::delete('/panduan-akademik/prosedur/{procedureStep}', [AcademicGuideController::class, 'destroyStep'])->name('guide.step.destroy');

        Route::get('/jadwal-akademik', [ScheduleController::class, 'index'])->name('schedule.index');

        Route::post('/jadwal-akademik/kuliah', [ScheduleController::class, 'storeCourse'])->name('schedule.course.store');
        Route::delete('/jadwal-akademik/kuliah/{course}', [ScheduleController::class, 'destroyCourse'])->name('schedule.course.destroy');

        Route::post('/jadwal-akademik/ujian', [ScheduleController::class, 'storeExam'])->name('schedule.exam.store');
        Route::delete('/jadwal-akademik/ujian/{exam}', [ScheduleController::class, 'destroyExam'])->name('schedule.exam.destroy');

        Route::post('/jadwal-akademik/sidang', [ScheduleController::class, 'storeDefense'])->name('schedule.defense.store');
        Route::delete('/jadwal-akademik/sidang/{defense}', [ScheduleController::class, 'destroyDefense'])->name('schedule.defense.destroy');

        Route::get('/galeri/foto', [PhotoGalleryController::class, 'index'])->name('photo.index');
        Route::post('/galeri/foto', [PhotoGalleryController::class, 'store'])->name('gallery.photo.store');
        Route::delete('/galeri/foto/{photo}', [PhotoGalleryController::class, 'destroy'])->name('gallery.photo.destroy');

        Route::get('/galeri/video', [VideoGalleryController::class, 'index'])->name('video.index');
        Route::post('/galeri/video', [VideoGalleryController::class, 'store'])->name('gallery.video.store');
        Route::delete('/galeri/video/{video}', [VideoGalleryController::class, 'destroy'])->name('gallery.video.destroy');

        Route::get('/dokumen', [AcademicDocumentController::class, 'index'])->name('document.index');
    Route::post('/dokumen', [AcademicDocumentController::class, 'store'])->name('document.store');
    Route::delete('/dokumen/{document}', [AcademicDocumentController::class, 'destroy'])->name('document.destroy');
        /*
        |--------------------------------------------------------------------------
        | Settings
        |--------------------------------------------------------------------------
        */

        // Route::resource('users', UserController::class);
        // Route::resource('roles', RoleController::class);
    });

require __DIR__.'/auth.php';
