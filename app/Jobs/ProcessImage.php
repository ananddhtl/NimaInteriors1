<?
namespace App\Jobs;

use App\Models\ProjectImages;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Image;
use Illuminate\Support\Facades\Storage;

class ProcessImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $filePath;
    protected $filename;
    protected $projectId;

    public function __construct($filePath, $filename, $projectId)
    {
        $this->filePath = $filePath;
        $this->filename = $filename;
        $this->projectId = $projectId;
    }

    public function handle()
    {
        $path = storage_path('app/' . $this->filePath);
        
        // Resize and compress the image
        $resizedImage = Image::make($path)
            ->resize(1920, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode('jpg', 85); // Compress to JPEG format with 85% quality

        $finalFilename = time() . '_' . uniqid() . '.jpg';
        $resizedImage->save(public_path('admin/projectimages/' . $finalFilename), 85);

        // Save image details to database
        $projectImage = new ProjectImages();
        $projectImage->project_id = $this->projectId;
        $projectImage->images = 'admin/projectimages/' . $finalFilename;
        $projectImage->save();

        // Clean up the temporary file
        unlink($path);
    }
}
