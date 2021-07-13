<?php

namespace social_coordination_center\Repositories;

use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Input;
use social_coordination_center\Models\Event;
use social_coordination_center\Models\Occasion;

class EventRepository extends BaseRepository
{
    protected $model;

    /**
     * EventRepository constructor.
     * @param Event $event
     */
    public function __construct(Event $event)
    {
        $this->model = $event;
    }

    /**
     * Get Model and return the instance.
     *
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */

    public function Search($pagination = false)
    {
        // $events = $this->model;

         // $events = $this->FiliterOptions();

        if (!$pagination) {
            $occasions = $this->OccasionsFiliterOptions();

            $occasions = $occasions->select(DB::raw('occasion_calendar.id , occasions.user_id , occasions.title , occasions.title_en , occasions.description , occasions.description_en , "" AS place , "" AS place_en ,"" AS event_type_id , "" AS country , "" AS google_address , "" AS city ,occasion_calendar.`start` , occasion_calendar.`end` , "" AS url , "" AS email ,  occasion_calendar.created_at , occasion_calendar.updated_at , occasions.deleted_at, "" AS registry , u.name AS org_name, occasions.color, occasions.background_color, 2 as cat_type, 0 as duration, true as allDay, "" AS phone_number,  "" AS orgLogo , "" AS orgAuthorityActivity , "" AS orgCountry , "" AS orgCity , "" AS orgAddress , "" AS orgEmail , "" AS orgJawal , "" AS orgPhone , "" AS reg_url , "" AS file, "" AS likes , "" AS org_review'))
                ->join('users as u', 'occasions.user_id', '=', 'u.id')
                ->join('occasion_calendar', 'occasions.id', '=', 'occasion_calendar.occasion_id');

        }

//        $events = $this->eventQuery();
$events = $this->FiliterOptions();



        if (!$pagination) {
            $events = $events->union($occasions);
        }

        if ($pagination) {
            $events = $events->orderBy('start', 'desc')->paginate(10);
        } else {
            $events = $events->orderBy('start', 'desc')->get();
        }

        return ($events);


    }

    public function FiliterOptions()
    {
        $filiter = $this->eventQuery();

        $city = Input::get('city');
        if (!is_null($city) && $city != '0') {
            if ($city != 'ALL' && $city != trans('config.all')) {
                $filiter = $filiter->where('events.city', $city);
            }
        }

        $country = Input::get('country');
        if (!is_null($country) && $country != '0') {

            if ($country != 'all') {
                $filiter = $filiter->where('events.country', $country);
            }
        }

        $scope = Input::get('scope');
        if (!is_null($scope) && $scope != '0') {

            if ($scope != 'all') {
                $filiter = $filiter->where('user_info.scope_type_id', $scope);
            }
        }

        $duration = Input::get('duration');
        if (!is_null($duration) && $duration != '0') {

            if ($duration != 'all') {
                $filiter = $filiter->join('event_targets', 'events.id', '=', 'event_targets.event_id')->where('event_targets.target_id', $duration);
            }
        }
//        if(!is_null($duration))
//        {
//            if($duration == 'day'){
//
//                $filiter = $filiter->whereDate('start', Carbon::today());
//            }
//            if($duration == 'week'){
//                $filiter = $filiter->whereBetween('start', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
//            }
//            if($duration == 'month'){
//                $today = Carbon::now();
//                $month = $today->month;
//                $lastMonth = $today->subDays(30);
//                $filiter = $filiter->whereMonth('start', $month)->orWhere('start', '>=', $lastMonth);
//            }
//        }

        $activity = Input::get('activity');
        if (!is_null($activity)) {
            if ($activity != 'all') {
                $filiter->join('user_activity', 'events.user_id', '=', 'user_activity.user_id')->where('activity_id', $activity);
            }
        }

        $eventId = Input::get('id');
        if (!is_null($eventId)) {
            if ($eventId != 'all') {
                $filiter = $filiter->where('events.id', $eventId);
            }
        }

        return $filiter;

    }

    public function OccasionsFiliterOptions()
    {
        $filiter = new Occasion();


        $duration = Input::get('duration');
        if (!is_null($duration)) {
            if ($duration == 'day') {

                $filiter = $filiter->whereDate('occasions.start', Carbon::today());
            }
            if ($duration == 'week') {
                $filiter = $filiter->whereBetween('occasions.start', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            }
            if ($duration == 'month') {
                $today = Carbon::now();
                $month = $today->month;
                $lastMonth = $today->subDays(30);
                $filiter = $filiter->whereMonth('occasions.start', $month)->orWhere('occasions.start', '>=', $lastMonth);
            }
        }


        return $filiter;

    }

    public function eventQuery()
    {
        $query = $this->model;

        $query = $query->join('users', 'events.user_id', '=', 'users.id')
            ->join('user_info', 'user_info.user_id', '=', 'users.id')
            ->join('countries', 'user_info.country_id', '=', 'countries.id')
            ->where('user_info.status', '1')
            ->select(DB::raw('events.id , events.user_id, events.title, events.title_en, events.description, events.description_en, events.place, events.place_en, events.event_type_id, events.country, events.google_address, events.city,events.`start`, events.`end`, events.url, events.email, events.created_at, events.updated_at, events.deleted_at,events.registry, users.name as org_name, color, background_color , 1 as cat_type, events.duration, true as allDay, events.phone_number,  user_info.logo AS orgLogo , user_info.authority_activity AS orgAuthorityActivity , countries.country_name_ar AS orgCountry , user_info.city AS orgCity , user_info.address AS orgAddress , users.email AS orgEmail , user_info.phone_number AS orgJawal , user_info.phone AS orgPhone, reg_url, events.file, user_info.org_review ,events.likes'));


        return $query;
    }

    public function Cities()
    {
        $items = $this->model->select('city')->distinct('city')->pluck('city', 'city');
        return $items;
    }

    public function find($id)
    {
        $events = $this->eventQuery();
        return  $events->where('events.id',$id)->get();
    }


}
