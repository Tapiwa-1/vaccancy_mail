<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['id' => '1','name' => 'Accounting & Finance Jobs','slug' => 'accounting-finance-jobs','created_at' => '2023-02-13 18:54:05','updated_at' => '2023-02-13 18:54:05','deleted_at' => NULL],
            ['id' => '2','name' => 'Admin & Office Jobs','slug' => 'admin-office-jobs','created_at' => '2023-02-13 18:54:23','updated_at' => '2023-02-13 18:54:23','deleted_at' => NULL],
            ['id' => '3','name' => 'Agriculture, Farming Jobs','slug' => 'agriculture-farming-jobs','created_at' => '2023-02-13 18:54:33','updated_at' => '2023-02-13 18:54:33','deleted_at' => NULL],
            ['id' => '4','name' => 'Applied Sciences, Aviation Jobs','slug' => 'applied-sciences-aviation-jobs','created_at' => '2023-02-13 18:54:42','updated_at' => '2023-02-13 18:54:42','deleted_at' => NULL],
            ['id' => '5','name' => 'Apprenticeship Intake Jobs','slug' => 'apprenticeship-intake-jobs','created_at' => '2023-02-13 18:54:56','updated_at' => '2023-02-13 18:54:56','deleted_at' => NULL],
            ['id' => '6','name' => 'Attachment & Internship Jobs','slug' => 'attachment-internship-jobs','created_at' => '2023-02-13 18:55:12','updated_at' => '2023-02-13 18:55:12','deleted_at' => NULL],
            ['id' => '7','name' => 'Banking Jobs','slug' => 'banking-jobs','created_at' => '2023-02-13 18:55:21','updated_at' => '2023-02-13 18:55:21','deleted_at' => NULL],
            ['id' => '8','name' => 'College, University & Nursing Intakes','slug' => 'college-university-nursing-intakes','created_at' => '2023-02-13 18:55:31','updated_at' => '2023-02-13 18:55:31','deleted_at' => NULL],
            ['id' => '9','name' => 'Construction Jobs','slug' => 'construction-jobs','created_at' => '2023-02-13 18:55:51','updated_at' => '2023-02-13 18:55:51','deleted_at' => NULL],
            ['id' => '10','name' => 'Consultancy, Research Jobs','slug' => 'consultancy-research-jobs','created_at' => '2023-02-13 18:56:02','updated_at' => '2023-02-13 18:56:02','deleted_at' => NULL],
            ['id' => '11','name' => 'Cruise Ship & Cabin Crew Jobs','slug' => 'cruise-ship-cabin-crew-jobs','created_at' => '2023-02-13 18:56:13','updated_at' => '2023-02-13 18:56:13','deleted_at' => NULL],
            ['id' => '12','name' => 'Diaspora Jobs','slug' => 'diaspora-jobs','created_at' => '2023-02-13 18:56:24','updated_at' => '2023-02-13 18:56:24','deleted_at' => NULL],
            ['id' => '13','name' => 'Driving & Logistics Jobs','slug' => 'driving-logistics-jobs','created_at' => '2023-02-13 18:56:37','updated_at' => '2023-02-13 18:56:37','deleted_at' => NULL],
            ['id' => '14','name' => 'Education & Teaching Jobs','slug' => 'education-teaching-jobs','created_at' => '2023-02-13 18:56:45','updated_at' => '2023-02-13 18:56:45','deleted_at' => NULL],
            ['id' => '15','name' => 'Engineering Jobs','slug' => 'engineering-jobs','created_at' => '2023-02-13 18:56:58','updated_at' => '2023-02-13 18:56:58','deleted_at' => NULL],
            ['id' => '16','name' => 'Environmental, Forestry Jobs','slug' => 'environmental-forestry-jobs','created_at' => '2023-02-13 18:57:08','updated_at' => '2023-02-13 18:57:08','deleted_at' => NULL],
            ['id' => '17','name' => 'General Work Jobs','slug' => 'general-work-jobs','created_at' => '2023-02-13 18:57:18','updated_at' => '2023-02-13 18:57:18','deleted_at' => NULL],
            ['id' => '18','name' => 'Graduate Trainee Jobs','slug' => 'graduate-trainee-jobs','created_at' => '2023-02-13 18:57:29','updated_at' => '2023-02-13 18:57:29','deleted_at' => NULL],
            ['id' => '19','name' => 'Healthcare, Pharmacy, Doctors Jobs','slug' => 'healthcare-pharmacy-doctors-jobs','created_at' => '2023-02-13 18:57:40','updated_at' => '2023-02-13 18:57:40','deleted_at' => NULL],
            ['id' => '20','name' => 'Human Resources, HR Jobs','slug' => 'human-resources-hr-jobs','created_at' => '2023-02-13 18:58:00','updated_at' => '2023-02-13 18:58:00','deleted_at' => NULL],
            ['id' => '21','name' => 'ICT & Computer Jobs','slug' => 'ict-computer-jobs','created_at' => '2023-02-13 18:58:10','updated_at' => '2023-02-13 18:58:10','deleted_at' => NULL],
            ['id' => '22','name' => 'Insurance Jobs','slug' => 'insurance-jobs','created_at' => '2023-02-13 18:58:20','updated_at' => '2023-02-13 18:58:20','deleted_at' => NULL],
            ['id' => '23','name' => 'Legal Jobs','slug' => 'legal-jobs','created_at' => '2023-02-13 18:58:34','updated_at' => '2023-02-13 18:58:34','deleted_at' => NULL],
            ['id' => '24','name' => 'Library, Records Management Jobs','slug' => 'library-records-management-jobs','created_at' => '2023-02-13 18:58:52','updated_at' => '2023-02-13 18:58:52','deleted_at' => NULL],
            ['id' => '25','name' => 'Manufacturing Jobs','slug' => 'manufacturing-jobs','created_at' => '2023-02-13 18:59:03','updated_at' => '2023-02-13 18:59:03','deleted_at' => NULL],
            ['id' => '26','name' => 'Media Jobs','slug' => 'media-jobs','created_at' => '2023-02-13 18:59:16','updated_at' => '2023-02-13 18:59:16','deleted_at' => NULL],
            ['id' => '27','name' => 'Media, PR & Communication Jobs','slug' => 'media-pr-communication-jobs','created_at' => '2023-02-13 18:59:25','updated_at' => '2023-02-13 18:59:25','deleted_at' => NULL],
            ['id' => '28','name' => 'Mining Jobs','slug' => 'mining-jobs','created_at' => '2023-02-13 18:59:33','updated_at' => '2023-02-13 18:59:33','deleted_at' => NULL],
            ['id' => '29','name' => 'NGO & Social Services Jobs','slug' => 'ngo-social-services-jobs','created_at' => '2023-02-13 18:59:42','updated_at' => '2023-02-13 18:59:42','deleted_at' => NULL],
            ['id' => '30','name' => 'Nursing Jobs','slug' => 'nursing-jobs','created_at' => '2023-02-13 18:59:55','updated_at' => '2023-02-13 18:59:55','deleted_at' => NULL],
            ['id' => '31','name' => 'Procurement, Purchasing Jobs','slug' => 'procurement-purchasing-jobs','created_at' => '2023-02-13 19:00:05','updated_at' => '2023-02-13 19:00:05','deleted_at' => NULL],
            ['id' => '32','name' => 'Real Estate Jobs','slug' => 'real-estate-jobs','created_at' => '2023-02-13 19:00:19','updated_at' => '2023-02-13 19:00:19','deleted_at' => NULL],
            ['id' => '33','name' => 'Retail Jobs','slug' => 'retail-jobs','created_at' => '2023-02-13 19:00:31','updated_at' => '2023-02-13 19:00:31','deleted_at' => NULL],
            ['id' => '34','name' => 'Sales & Marketing Jobs','slug' => 'sales-marketing-jobs','created_at' => '2023-02-13 19:00:41','updated_at' => '2023-02-13 19:00:41','deleted_at' => NULL],
            ['id' => '35','name' => 'Scholarships','slug' => 'scholarships','created_at' => '2023-02-13 19:02:10','updated_at' => '2023-02-13 19:02:10','deleted_at' => NULL],
            ['id' => '36','name' => 'Security Jobs','slug' => 'security-jobs','created_at' => '2023-02-13 19:02:23','updated_at' => '2023-02-13 19:02:23','deleted_at' => NULL],
            ['id' => '37','name' => 'SHE Jobs','slug' => 'she-jobs','created_at' => '2023-02-13 19:02:32','updated_at' => '2023-02-13 19:02:32','deleted_at' => NULL],
            ['id' => '38','name' => 'Sports & Recreation Jobs','slug' => 'sports-recreation-jobs','created_at' => '2023-02-13 19:02:43','updated_at' => '2023-02-13 19:02:43','deleted_at' => NULL],
            ['id' => '39','name' => 'Stores & Warehouse Jobs','slug' => 'stores-warehouse-jobs','created_at' => '2023-02-13 19:03:00','updated_at' => '2023-02-13 19:03:00','deleted_at' => NULL],
            ['id' => '40','name' => 'Strategic Management Jobs','slug' => 'strategic-management-jobs','created_at' => '2023-02-13 19:03:34','updated_at' => '2023-02-13 19:03:34','deleted_at' => NULL],
            ['id' => '41','name' => 'Student Loans','slug' => 'student-loans','created_at' => '2023-02-13 19:03:44','updated_at' => '2023-02-13 19:03:44','deleted_at' => NULL],
            ['id' => '42','name' => 'Tenders','slug' => 'tenders','created_at' => '2023-02-13 19:04:02','updated_at' => '2023-02-13 19:04:02','deleted_at' => NULL],
            ['id' => '43','name' => 'Tourism, Hospitality, Hotel Jobs','slug' => 'tourism-hospitality-hotel-jobs','created_at' => '2023-02-13 19:04:25','updated_at' => '2023-02-13 19:04:25','deleted_at' => NULL]
        ];
        Category::insert($categories);
    }
}
